<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $email
 * @property string $subject
 * @property string $message
 */
class ContactModel extends Model
{
    protected $table = 'contact';

    protected $fillable = ['email', 'subject', 'message'];
}
