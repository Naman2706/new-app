<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Student;

class StudentTest extends TestCase
{
    use RefreshDatabase;


    protected function actingAsAdmin():void
    {

         $this->actingAs(factory(User::class)->create());
         $this->withoutExceptionHandling();
    }

    protected function data()
    {
        return [
            'name'=>'test1',
            'email'=>'test1@gmail.com',
            'address'=>'earth',
            'contactno'=>'7788990022',
            'percentage'=>'90'
        ];
    }

  

    public function test_only_logged_in_user_can_access_the_studentlist(){

        $response= $this->get('/students')
                    ->assertRedirect('/login');
    }

    public function test_only_logged_in_user_can_add_student(){

        $response= $this->get('/addstudent')
                    ->assertRedirect('/login');
    }

     public function test_authenticated_user_can_access_the_studentlist(){

        $this->actingAsAdmin();
        $response= $this->get('/students')
                    ->assertOk();
    }

    public function test_authenticated_user_can_add_student(){

        $this->actingAsAdmin();
        $response= $this->get('/addstudent')
                     ->assertOk();
    }

      public function test_a_student_can_be_created(){

        
        $this->actingAsAdmin();
 
        $response = $this->post('/addstudent',$this->data()); 

        $response->assertOk();

        $this->assertCount(1,Student::all());
        
    }

    public function test_a_student_name_can_be_updated(){

        
        $this->actingAsAdmin();
 
        $response = $this->post('/addstudent',$this->data()); 

        $student = Student::first();

        $response = $this->put('/editstudent/' . $student->id,
        [
            'name'=>'test2',
            'email'=>'test1@gmail.com',
            'address'=>'earth',
            'contactno'=>'7788990022',
            'percentage'=>'90'
        ]);

        $response->assertOk();

        $this->assertEquals('test2',Student::first()->name);
        
    }

    public function test_a_student_email_can_be_updated(){

        
        $this->actingAsAdmin();
 
        $response = $this->post('/addstudent',$this->data()); 

        $student = Student::first();

        $response = $this->put('/editstudent/' . $student->id,
        [
            'name'=>'test1',
            'email'=>'test2@gmail.com',
            'address'=>'earth',
            'contactno'=>'7788990022',
            'percentage'=>'90'
        ]);

        $response->assertOk();

        $this->assertEquals('test2@gmail.com',Student::first()->email);
        
    }

    public function test_a_student_address_can_be_updated(){

        
        $this->actingAsAdmin();
 
        $response = $this->post('/addstudent',$this->data()); 

        $student = Student::first();

        $response = $this->put('/editstudent/' . $student->id,
        [
            'name'=>'test2',
            'email'=>'test1@gmail.com',
            'address'=>'mars',
            'contactno'=>'7788990022',
            'percentage'=>'90'
        ]);

        $response->assertOk();

        $this->assertEquals('mars',Student::first()->address);
        
    }

    public function test_a_student_contactno_can_be_updated(){

        
        $this->actingAsAdmin();
 
        $response = $this->post('/addstudent',$this->data()); 

        $student = Student::first();

        $response = $this->put('/editstudent/' . $student->id,
        [
            'name'=>'test2',
            'email'=>'test1@gmail.com',
            'address'=>'earth',
            'contactno'=>'778899002233',
            'percentage'=>'90'
        ]);

        $response->assertOk();

        $this->assertEquals('778899002233',Student::first()->contactno);
        
    }

    public function test_a_student_percentage_can_be_updated(){

        
        $this->actingAsAdmin();
 
        $response = $this->post('/addstudent',$this->data()); 

        $student = Student::first();

        $response = $this->put('/editstudent/' . $student->id,
        [
            'name'=>'test2',
            'email'=>'test1@gmail.com',
            'address'=>'earth',
            'contactno'=>'778899002233',
            'percentage'=>'80'
        ]);

        $response->assertOk();

        $this->assertEquals('80',Student::first()->percentage);
        
    }

     public function test_a_student_can_be_deteted(){

        
        $this->actingAsAdmin();
 
        $response = $this->post('/addstudent',$this->data()); 

        $student = Student::first();

        $response->assertOk();

        $response = $this->delete('/student/'. $student->id);

        $this->assertCount(0,Student::all());

        $response->assertRedirect('/students');
        
    }
}
