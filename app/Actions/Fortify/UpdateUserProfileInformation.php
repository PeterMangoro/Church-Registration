<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'max:255', Rule::unique('users')->ignore($user->id)],
            'dob' => ['required'],
            'gender' => ['required', 'string', 'max:255'],
            'province' => ['nullable', 'string', 'max:255'],
            'assembly' => ['required_with:pastor', 'string', 'max:255','nullable'],
            'pastor' => ['required_with:assembly', 'string', 'max:255','nullable'],
            'invite' => ['nullable', 'string', 'max:255'],
            'need_accommodation' => ['nullable', 'string', 'max:255'],
        ])->validateWithBag('updateProfileInformation');

    
        if ($input['username'] !== $user->username &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'username' => $input['username'],
                'dob' => $input['dob'],
                'gender' => $input['gender'],
                'province' => $input['province'],
                'assembly' => $input['assembly'],
                'pastor' => $input['pastor'],
               
                'need_accommodation' => $input['need_accommodation'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'username' => $input['username'],
            'username_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
