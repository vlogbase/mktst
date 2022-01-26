<?php

namespace App\Http\Livewire\Customer;

use App\Models\JobResume;
use Livewire\Component;
use Livewire\WithFileUploads;
use Manny;

class JobResumeForm extends Component
{
    use WithFileUploads;
    public $email;
    public $name;
    public $phone;
    public $department;
    public $message;
    public $resume;
    public $surname;

    public function messageAttempt()
    {
        $data =  $this->validate([
            'email' => 'required|email|unique:users,email',
            'surname' => 'required|min:2|max:50',
            'name' => 'required|min:2|max:50',
            'phone' => 'required|min:13|max:13',
            'department' => 'required',
            'message' => 'required|min:10|max:1000',
            'resume' => 'required|mimes:pdf|max:5048'
        ]);

        $resume = $this->resume->store('upload/career/resumes', 'public');
        JobResume::updateOrCreate(
            ['email' => $this->email],
            [
                'surname' => $this->surname,
                'name' => $this->name,
                'phone' => $this->phone,
                'department' => $this->department,
                'message' => $this->message,
                'resume_path' => $resume
            ]
        );
        $this->emit('succesAlert', 'Your Resume Sent!');
    }

    public function updated($field)
    {

        if ($field == 'phone') {
            //this is where we will detect any changes to the mobile field.
            $this->phone = Manny::mask($this->phone, "+111111111111");
        }
    }
    public function render()
    {
        return view('livewire.customer.job-resume-form');
    }
}
