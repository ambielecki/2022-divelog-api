<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Hash;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class LoginMutation
{
    public function resolve($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): ?array {
        $email = $args['email'] ?: null;
        $password = $args['password'] ?: null;

        $user = User::where('email', $email)->first();
        $auth = Hash::check($password, $user->password);

        if ($auth) {
            $expire_minutes = config('sanctum.expiration');
            $token = $user->createToken('token');
            return [
                'token' => $token->plainTextToken,
                'expiresTime' => strtotime("+$expire_minutes minutes"),
            ];
        }

        return null;
    }
}
