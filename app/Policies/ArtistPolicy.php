<?php

namespace App\Policies;

use App\User;
use App\Artist;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArtistPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the artist.
     *
     * @param  \App\User  $user
     * @param  \App\Artist  $artist
     * @return mixed
     */
    public function view(User $user, Artist $artist)
    {
        //
    }

    /**
     * Determine whether the user can create artists.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the artist.
     *
     * @param  \App\User  $user
     * @param  \App\Artist  $artist
     * @return mixed
     */
    public function update(User $user, Artist $artist)
    {
        //
    }

    /**
     * Determine whether the user can delete the artist.
     *
     * @param  \App\User  $user
     * @param  \App\Artist  $artist
     * @return mixed
     */
    public function delete(User $user, Artist $artist)
    {
        // The User must own the Artist.

        return $artist->user->id === $user->id;
    }

    /**
     * Determine whether the user can restore the artist.
     *
     * @param  \App\User  $user
     * @param  \App\Artist  $artist
     * @return mixed
     */
    public function restore(User $user, Artist $artist)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the artist.
     *
     * @param  \App\User  $user
     * @param  \App\Artist  $artist
     * @return mixed
     */
    public function forceDelete(User $user, Artist $artist)
    {
        //
    }
}
