<?php

namespace App\Http\Controllers;

use App\Http\Resources\TokenResource;
use App\Models\Token;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function store(Request $request) {
        $t = new TokenResource(Token::create($request->all()));
        return "true";
    }

    public function validate(Request $request) {
        $t = Token::where("token", "=", $request->token)->first();
        if(isset($t) && !empty($t)) {
            return "true";
        }
        return "false";
    }

    public function destroy(Request $request) {
        Token::where("token", "=", $request->token)->delete();
        return "true";
    }
}
