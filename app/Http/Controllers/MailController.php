<?php

namespace App\Http\Controllers;

use App\User;

class MailController extends Controller
{
    /**
     * Show the form to create a new resource.
     *
     * @return Response
     */
    public function send($user, $template, $data)
    {
        \Mail::send($template, $data, function ($message) use ($user, $data) {
            $message->from(config('mail.from.address'),config('mail.from.name'));
            $message->subject($data['subject']);
            $message->to($user->email, $user->username);
        });
    }

    /**
     * send the registration email.
     */
    public function registered(User $user)
    {
        $template = ('mail.registered');
        $data = $this->getSignupData($user);
        $this->send($user, $template, $data);
    }
    /**
     * [send email to sponsor].
     *
     * @param User $user [sp_id]
     *
     * @return [int] [sponsor id]
     */
    public function sendToSponsor(User $user)
    {
        $template = ('mail.sponsor');
        $data = $this->getSponsorData($user);
        $sponsor = $user->sponsor();
        $this->send($sponsor, $template, $data);
    }

    /**
     * send the activation email.
     */
    public function activated(User $user)
    {
        $template = ('mail.activated');
        $data = $this->getActivationData($user);
        $this->send($user, $template, $data);
    }

    /**
     * send the password reset email.
     */
    public function passwordLink(User $user)
    {
        $template = ('mail.restore');
        $data = $this->getResetData($user);
        $this->send($user, $template, $data);
    }

    /**
     * return the required data for the sign up email.
     *
     * @return array
     */
    public function getSignupData($user)
    {
        $data = array(
            'subject' => 'Welcome to Essensa Naturale Online! Your Email Needs to be Verified!',
            'body' => 'Thanks for signing up into our system, please click this link to',
            'activation_code' => $user->activation_code,
            'title' => 'Thanks for you registration',
            'email' => $user->email,
            'username' => $user->username,
        );

        return $data;
    }

    /**
     * return the required data for the sign up email.
     *
     * @return array
     */
    public function getSponsorData($user)
    {
        $profile = $user->profile;
        $firstname = $profile->first_name;
        $lastname = $profile->last_name;
        $full_name = $firstname.' '.$lastname;
        $email = $user->email;
        $sponsor = $user->sponsor();
        $sp_fn = $sponsor->profile->first_name;
        $sp_ln = $sponsor->profile->last_name;
        $sp_fullname = $sp_fn.' '.$sp_ln;
        $data = array(
            'subject' => 'Essensa Naturale Online : You Have a New Referral!',
            'body' => 'Your New Referred Customer is '.$full_name,
            'info' => 'You Can Welcome and Guide Your New Referred Customer/Affiliate by Contacting Thru His/Her Email At '.$email,
            'title' => 'Congratulations! '.$sp_fullname.' You Have a New Referral!',
            'email' => $sponsor->email,
        );

        return $data;
    }

    /**
     * return the required data for the activation email.
     *
     * @return array
     */
    public function getActivationData($user)
    {
        $data = array(
            'subject' => 'Account activated',
            'body' => 'Your account has been succsessfully activated.',
            'title' => 'Welcome to Essensa Naturale Online!',
            'email' => $user->email,
        );

        return $data;
    }

    /**
     * return the required data for the password reset email.
     *
     * @return array
     */
    public function getResetData($user)
    {
        $data = array(
            'subject' => 'Password reset',
            'body' => 'Please click to the link below to change your password',
            'activation_code' => $user->activation_code,
            'title' => 'Password reset',
            'email' => $user->email,
        );

        return $data;
    }

    public function passwordResend(User $user)
    {
        $template = ('mail.resend');
        $data = $this->getResendData($user);
        $this->send($user, $template, $data);
    }

    public function getResendData($user)
    {
        $data = array(
            'subject' => 'Password Activation Resend',
            'body' => 'Please click to the link below to activate your Account',
            'activation_code' => $user->activation_code,
            'title' => 'Password Resend',
            'email' => $user->email,
        );

        return $data;
    }
}
