<h2>Hello {{ $appointment->user->fname }} {{ $appointment->user->lname }},</h2>

<p>We are pleased to inform you that your upcycling appointment with 
<strong>{{ $appointment->upcycler->fname }} {{ $appointment->upcycler->lname }}</strong> 
has been successfully <strong>completed</strong>, and your item is now <strong>ready for pickup</strong>.</p>

<p><strong>Appointment Details:</strong></p>
<ul>
  <li><strong>Service Type:</strong> {{ $appointment->apptype }}</li>
  <li><strong>Date of Appointment:</strong> {{ \Carbon\Carbon::parse($appointment->appdate)->format('F j, Y \a\t g:i A') }}</li>
</ul>

<p>You may proceed to collect your item at your earliest convenience. Should you require any assistance, please feel free to get in touch with us through our support channels.</p>

<p>Thank you for choosing our upcycling services and for supporting a more sustainable future.</p>

<p>Warm regards,</p>
<p><strong>The Upcycling Team</strong></p>
