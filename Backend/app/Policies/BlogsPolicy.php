<?php

namespace App\Policies;

use App\Models\Blogs;
use App\Models\Users;
use Illuminate\Auth\Access\Response;

class BlogsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Users $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Users $user, Blogs $blogs): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Users $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Users $user, Blogs $blogs): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Users $user, Blogs $blogs): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Users $user, Blogs $blogs): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Users $user, Blogs $blogs): bool
    {
        //
    }
}
