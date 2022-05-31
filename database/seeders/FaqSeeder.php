<?php

namespace Database\Seeders;

use App\Library\Token;
use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder{

    function __construct(){
        return $this->run();
    }

    private $faqs = [
        [
            'title' => 'How can I register on Libraclass?',
            'type' => 'student',
            'content' => '<p>To register you either visit&nbsp;<a href="http://www.libraclass.com">www.libraclass.com</a> or click on your referrer&rsquo;s link to access our homepage and click the &ldquo;get started&rsquo; icon.</p>'
        ],

        [
            'title' => 'Where will the classes take place?',
            'type' => 'student',
            'content' => '<p>There are no fixed platforms for which the classes are to take place. The venue for each class is mentor-specific. What this means is that the platform for receiving a class is predetermined by the mentor. Some of these platforms include Google Classroom, Google Meet, Edmodo, Zoom etc.</p>'
        ],

        [
            'title' => 'Will I get a certificate after each class?',
            'type' => 'student',
            'content' => '<p>Certification after completion of a course/class is relative as it is solely the Mentor&rsquo;s decision as to whether or not certificates would be issued after a class.</p>'
        ],

        [
            'title' => 'Can I withdraw my referral earnings?',
            'type' => 'student',
            'content' => '<p>Referral earnings cannot be withdrawn as cash, rather it can be accumulated on the system to purchase courses from our platform. However, referral commission percentage can be set by the admin at any given time.</p>'
        ],

        [
            'title' => 'How can I get accepted as a Mentor?',
            'type' => 'mentor',
            'content' => '<p>A mentor must tender proper credentials to meet the admin&rsquo;s requirements before his/her application for mentorship on boarding can be approved.</p>'
        ],

        [
            'title' => 'What documents do I need for my account to be verified?',
            'type' => 'mentor',
            'content' => '<p>When submitting applications for mentorship on boarding, users must submit certifications or portfolios relating to the field they intend to mentor Libraclass students under as well as a cover letter and a letter of motivation</p>'
        ],

        [
            'title' => 'What can I expect from mentors on the platform?',
            'type' => 'mentor',
            'content' => '<p>As a student you can expect flexible hours for receiving lectures as well as one-on-one reflection sessions with mentors upon demand. This enables students to get first-hand experience of what mentorship entails.</p>'
        ],

        [
            'title' => 'How can I sell my courses on the platform?',
            'type' => 'mentor',
            'content' => '<p>As soon as your course has been created and approved, you can go ahead to share the link to the course for individuals to make a purchase of it from the Libraclass platform.</p>'
        ],
        [
            'title' => 'Can I share my courses on other platforms or social media?',
            'type' => 'mentor',
            'content' => '<p>Courses created and shared on the Libraclass platform cannot be shared on other platforms. Rather, mentors can create sponsored ads to refer users to register with Libraclass to access the course.</p>'
        ],
        [
            'title' => 'How can mentors withdraw their earnings?',
            'type' => 'mentor',
            'content' => '<p>Mentors can withdraw their earnings when they meet the minimum required amount set by the admin. The mentor can withdraw their earnings for each batch after a set period of time from the date the batch was set to end. Prior to submitting withdrawal applications, mentors must have set up their crypto wallets and linked it to their accounts accordingly. Once a withdrawal request meets the aforementioned requirements, it will automatically be authorised and the mentor would receive his/her earnings to the provided wallet address.</p>'
        ],
        [
            'title' => 'How reliable is the payment system?',
            'type' => 'mentor',
            'content' => '<p>Our payment system runs on a Flutterwave a highly reliable payment gateway available for conducting transactions in various currencies.</p>'
        ],
        [
            'title' => 'Where can I reach out to the Libraclass management if my question was not answered here?',
            'type' => 'mentor',
            'content' => '<p>You can make use of the &ldquo;Contact Us&rdquo; feature to reach out by taking the following steps.</p>
            <p>&bull;&nbsp; &nbsp;&nbsp;Click on the &ldquo;Contact Us&rdquo; button.</p>
            <p>&bull;&nbsp; &nbsp;&nbsp;Fill the form with a working email address and your preferred question(s).</p>
            <p>&bull;&nbsp; &nbsp;&nbsp;Submit the form and be on the lookout for an acknowledgement mail and a feedback mail on your mail box or spam box.</p>
            <p>Or you can send us a direct mail at&nbsp;<a href="mailto:support@libraclass.com">support@libraclass.com</a> </p>'
        ],
    ];

    public function run(){
        foreach ($this->faqs as $value) {
            $unique_id = Token::unique('faqs');

            Faq::updateOrCreate([
                'title' => $value['title'],
                'type' => $value['type'],
                'content' => $value['content']
            ], [
                'unique_id' => $unique_id,
                'title' => $value['title'],
                'type' => $value['type'],
                'content' => $value['content']
            ]);
        }

        return true;
    }
}
