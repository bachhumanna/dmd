<?php

namespace App\Traits;

use Auth;

/**
 * Class UserScope.
 */
trait FranchiseeTraits {

    public function scopeFranchisee($query) {
        if (session()->has('selectedFranchisees')) {
            return $query->where('franchisees_id', session()->get('selectedFranchisees'));
        }
    }
    
    public function scopeFra($query) {
        if (session()->has('selectedFranchisees')) {
            return $query->where('id', session()->get('selectedFranchisees'));
        }
    }

    public function scopeFranchiseeRole($query) {
        if (session()->has('selectedFranchisees')) {
            return $query->where('franchisees_id', session()->get('selectedFranchisees'));
        } else {
            return $query->where('franchisees_id',0);
        }
    }

    public function scopefranchiseeUser($query) {
        return $query->where('user_type', 2);
    }

}
