<?php

namespace App;

use App\Http\Requests\RegistrationFormRequest;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Str;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }

    public function phoneNumber()
    {
        return $this->hasMany(PhoneNumber::class);
    }

    public function adress()
    {
        return $this->hasMany(Adress::class);
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }


    public function newSeller(RegistrationFormRequest $request, $cooperativeId)
    {
        $this->name = $request->name;
        $this->user_name = $request->email;
        $this->email = $request->email;
        $this->password = bcrypt($request->password);
        $this->cooperative_id = $cooperativeId;
        $this->role_id = 3;
        $this->remember_token  = Str::random(32);
        $this->save();
    }

    public function newUser(RegistrationFormRequest $request)
    {
        $this->name = $request->name;
        $this->user_name = $request->email;
        $this->email = $request->email;
        $this->password = bcrypt($request->password);
        $this->cooperative_id = null;
        $this->role_id = 2;
        $this->remember_token  = Str::random(32);
        $this->save();
    }

    public function activateUser()
    {
        $this->is_email_verified = true;
        $this->is_activated = true;
        $this->email_verified_at =  Carbon::now();
        $this->save();
    }

    public function activateSeller()
    {
        // $this->is_email_verified = true;
        $this->is_activated = true;
        // $this->email_verified_at =  Carbon::now();
        $this->save();
    }


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
