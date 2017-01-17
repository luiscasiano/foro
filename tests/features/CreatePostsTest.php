<?php

/**
 * Created by PhpStorm.
 * User: piscouser
 * Date: 16/01/2017
 * Time: 01:59 AM
 */
class CreatePostsTest extends FeaturesTestCase
{

    public function test_a_user_create_a_post()
    {
        //having
        $title='Esta es una pregunta';
        $contenido='Este es el contenido';
        $user= $this->defaultUser();
        $this->actingAs($user);

        // when
        $this->visit(route('posts.create'))
            ->type($title,'title')
            ->type($contenido,'content')
            ->press('Publicar');

        //then
        $this->seeInDatabase('posts',[
            'title'=>$title,
            'content'=>$contenido,
            'pending'=>true,
            'user_id'=>$user->id,

        ]);


        //Test a user is redirected to the posts details after creating it.
        $this->see($title);




    }


    public function test_creating_a_post_requires_authentication()
    {

        //when
        $this->visit(route('posts.create'))
            ->seePageIs(route('login'));

    }

    function test_create_post_form_validation(){

        $this->actingAs($this->defaultUser())
            ->visit(route('posts.create'))
            ->press('Publicar')
            ->seePageIs(route('posts.create'))
            ->seeErrors([
                'title'=>'El campo título es obligatorio',
                'content'=>'El campo contenido es obligatorio'
                ]);

    }


}