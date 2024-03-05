<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Comment extends Model
// {
//     use HasFactory;

//     public function up()
//     {
//         Schema::create('comments', function (Blueprint $table) {
//             $table->id();
//             $table->text('content');
//             $table->foreignId('post_id')->constrained()->onDelete('cascade');
//             $table->foreignId('user_id')->constrained()->onDelete('cascade');
//             $table->timestamps();
//         });
//     }

//     public function down()
//     {
//         Schema::dropIfExists('comments');
//     }
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'post_id', 'user_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}