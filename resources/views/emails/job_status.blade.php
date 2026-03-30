<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 10px; }
        .header { background-color: #f8f9fa; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { padding: 20px; }
        .footer { font-size: 12px; color: #777; text-align: center; margin-top: 20px; }
        /* Style agar role dan perusahaan Bold Hitam */
        .highlight { font-weight: bold; color: #000; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Job Application Update</h2>
        </div>
        <div class="content">
            <p>Dear <strong>{{ $application->full_name }}</strong>,</p>

            <p>Thank you for your interest in the <span class="highlight">{{ $application->job_vacancy->name ?? 'Internship' }}</span> role at <span class="highlight">PT Aro Baskara Esa</span> and for taking the time to engage in our hiring process. It was a pleasure learning about your background and experiences.</p>

            @if($application->status == 'accepted')
                <p>After carefully considering our company’s needs and requirements, <strong>we are pleased to inform you that we would like to move forward with your application.</strong> Your qualifications and skills are a great match for what we are looking for in this role.</p>
                <p>Our HR team will contact you shortly to discuss the next steps, including the onboarding process and necessary documentation. Congratulations!</p>

            @elseif($application->status == 'reviewed')
                <p>We would like to inform you that <strong>your application is currently being reviewed</strong> by our hiring team. We are carefully evaluating all candidates to ensure the best fit for our company's needs.</p>
                <p>This process may take some time, and we appreciate your patience. We will provide you with a further update as soon as a decision regarding the next stage has been made.</p>

            @else
                <p>After considering our company’s needs and requirements, we regret to inform you that we can’t move forward with your application. This decision was not an easy one, and it reflects the competitive nature of this role rather than any shortcomings on your part.</p>
                <p>For your information, your application has been stored in our database. We will contact you in the future if there is an opening according to your qualification.</p>
            @endif

            <p>Thank you for your interest in our Company. We wish you a bright and successful career.</p>
            
            <p><em>Please move this email to Inbox to open the attached links.</em></p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} PT Aro Baskara Esa. All rights reserved.</p>
        </div>
    </div>
</body>
</html>