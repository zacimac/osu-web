<?php

/**
 *    Copyright (c) ppy Pty Ltd <contact@ppy.sh>.
 *
 *    This file is part of osu!web. osu!web is distributed with the hope of
 *    attracting more community contributions to the core ecosystem of osu!.
 *
 *    osu!web is free software: you can redistribute it and/or modify
 *    it under the terms of the Affero GNU General Public License version 3
 *    as published by the Free Software Foundation.
 *
 *    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
 *    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *    See the GNU Affero General Public License for more details.
 *
 *    You should have received a copy of the GNU Affero General Public License
 *    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace App\Http\Controllers\Passport;

use App\Http\Controllers\Controller;
use Laravel\Passport\Token;

/**
 * Extension of Laravel\Passport\Http\Controllers\AuthorizationController
 * to add support for scope normalization when requesting token scopes.
 */
class TokensController extends Controller
{
    protected $section = 'user';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');
        $this->middleware('verify-user');
    }

    public function tokens()
    {
        return view('accounts.tokens');
    }

    public function revokeClient($clientId)
    {
        auth()
            ->user()
            ->tokens()
            ->where('client_id', $clientId)
            ->update([
                'revoked' => true,
                'updated_at' => now(),
            ]);

        return response(null, 204);
    }
}
