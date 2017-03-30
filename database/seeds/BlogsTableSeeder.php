<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog_one = new Blog();
        $blog_one->title = 'First blog';
        $blog_one->slug = 'first-blog';
        $blog_one->meta_title = 'First blog';
        $blog_one->meta_des = 'First blog';
        $blog_one->body = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer felis velit, sollicitudin a risus sit amet, euismod vestibulum ligula. Quisque porta risus pharetra lacus suscipit blandit. Nullam egestas semper ipsum ac mollis. Duis finibus nibh ut vulputate convallis. Nunc vitae dictum justo, non vehicula sapien. Nam lectus risus, hendrerit ac mauris quis, posuere viverra diam. Donec venenatis, nibh vulputate tincidunt commodo, ante dolor fringilla diam, in posuere nisi lectus id ante.';
        $blog_one->save();

        $blog_two = new Blog();
        $blog_two->title = 'Second blog';
        $blog_two->slug = 'second-blog';
        $blog_two->meta_title = 'Second blog';
        $blog_two->meta_des = 'Second blog';
        $blog_two->body = 'Sed id turpis urna. Donec maximus nunc sit amet diam fermentum rutrum. Sed commodo urna ut luctus pellentesque. Vestibulum vestibulum leo ut tortor condimentum pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean auctor congue ligula vitae luctus. Etiam facilisis felis justo, vel elementum nibh feugiat at. Ut nec felis eu arcu porta rhoncus a eu dolor.';
        $blog_two->save(); 
    }
}
