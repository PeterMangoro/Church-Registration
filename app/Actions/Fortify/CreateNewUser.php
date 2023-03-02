<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'dob' => ['required'],
            'province' => ['required', 'string', 'max:255'],
            'assembly' => ['required_with:pastor', 'string', 'max:255','nullable'],
            'pastor' => ['required_with:assembly', 'string', 'max:255','nullable'],
            'invite' => ['nullable', 'string', 'max:255'],
            'need_accommodation' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'gender' => $input['gender'],
            'username' => $input['username'],
            'dob' => $input['dob'],
            'province' => $input['province'],
            'assembly' => $input['assembly'],
            'pastor' => $input['pastor'],
            'invite' => $input['invite'],
            'need_accommodation' => $input['need_accommodation'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
