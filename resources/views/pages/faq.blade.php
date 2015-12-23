@extends('master')


@section('content')

	<div class="container">
            <h1 class="page-title" style="color: #ed8323;">Frequently Asked Questions</h1>
        </div>

	<div class="container">
		<div class="col-md-12">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-1" >1.   What is Afroute.com?</a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-1">
                        <div class="panel-body">Afroute.com is a service facilitating company that make transaction between the travelers’ and transport companies easy for both parties through the internet.</div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-2" >2.   What are the benefits of booking bus tickets through Afroute.com?</a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-2">
                        <div class="panel-body">
                            <ul>
                                <li><b>Save time</b>: avoid long queues and waiting, visit terminal at the actual departure time.</li>
                                <li><b>Wide operator selection</b>: get instant access to all transport companies and travel routes on your fingertips, which improves your chances of finding transport anytime.</li>
                                <li><b>Convenience</b>: 24/7 access to book transport tickets through our website, telephone access from the comfort of your home, office, school, etc.</li>
                                <li><b>Best services</b>: we help you discover the best transport companies.</li>
                                <li><b>Care</b>: we offer you exceptional customer care service.</li>
                                <li><b>Secure Payment</b>: You can pay for tickets through cash codes, online banking codes (speed banking), and mobile money transfers. </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-3" >3.   How do I use Afroute.com</a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-3">
                        <div class="panel-body">
                            <ol>
                                <li>Inside you browser url type www.afroute.com and press enter our website page will display on your screen.</li>
                                <li>On the top right side of the page you will find signup/register click on it and the registration page will display, then you fill in the various fields with it requirement or you choose one of the social media link to register with.</li>
                                <li>After registration, you can search for your departure and destination points, which will display result of various trips, fares of different travel companies to book any of your choice</li>
                                <li>Booking page display your preferred departure, destination and payment process, when through with the process your ticket will be sent to your email. </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-4" >4.   Why is it mandatory that I provide personal identification during booking of tickets?</a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-4">
                        <div class="panel-body">You must fill in the field "identification" when booking tickets. 
                        Your mobile number will be used to send Booking confirmation SMS, for verification,
                         Bus operator will be able to contact you quickly in case you are not on time at the boarding point or Afroute.com will be able to contact you if there is any change in schedule.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-5" >5.   I have not receive my ticket to my email ID, what do I do?</a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-5">
                        <div class="panel-body">If you did not receive an email after your conformation of the booking, 
There can be two reasons: The electronic cash code or online code payment has failed. In this case the purchase is cancelled by the system. The email ticket has ended up in spam folder.  Please contact us in order to solve this problem, then you can retry the booking. 
If you have any further questions, please feel free to call our 24/7 customer support.
</div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-6" >6.   Is it mandatory to carry the require identity proof along with my e tickets?</a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-6">
                        <div class="panel-body">Yes. It is mandatory to carry government issued identity proofs along with your e-ticket.</div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-7" >7.   Is it safe to use my payment card on this site?</a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-7">
                        <div class="panel-body">Transactions on our website are very safe. We employ the best-in-class security and the transactions done are secure. We use SSL to ensure that the information exchanged with us is never transmitted unprotected.</div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-8" >8.   Can I cancel my ticket online?</a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-8">
                        <div class="panel-body">
                            <p>
                                Yes you can cancel your ticket by contacting us via phone or our contact page. However your cancellation must be 6hrs before your departure time.
                            </p>
                            <p>
                                Our cancellation fee is 30% of the corresponding travel fare.
                                However please note that the cancellation fee and cancellation period may differ for specific bus services.
                            </p>
                            <p>
                                Please contact any of our executives for cancellation details on any specific service.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-9" >9.   Can I pay for someone else?</a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-9">
                        <div class="panel-body">
                            Yes, you can pay/book bus tickets for others. It is not necessary that the payee has to travel. Please make sure you are giving the right details for all passengers and also make sure they carry the Govt. issued ID cards to ensure that there won't be any issues.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-10" >10.  I missed the bus. Do I get a refund?</a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-10">
                        <div class="panel-body">
                            We provide a 100% refund if the bus is missed due to either our or our partner company's fault. However, if the bus is missed due to any other reason not directly related to us, no refund is provided.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-11" >11.  Is Phone booking of bus tickets available?</a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-11">
                        <div class="panel-body">
                            No. You cannot book your bus tickets by phone.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-12" >12.  Are there any separate Bus Operator Rules I need to know?</a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-12">
                        <div class="panel-body">
                            Each Bus Operator has their own rules regarding amount of luggage allowed, available luggage space, extra payments for boxes, etc. Each Bus Operator has its own conditions of refunds - these are displayed to you when you are choosing the Bus during the booking process. Please feel free to call our 24/7 customer support if you need any specific information
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-13" >13.  What are the rules on luggage?</a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-13">
                        <div class="panel-body">
                            Every transport Operator has its own rules regarding amount of luggage allowed, available luggage space, extra payments for boxes, etc. Please feel free to call our 24/7 customer support if you need any specific information
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-14" >14.  What if I have additional questions?</a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-14">
                        <div class="panel-body">
                            If you have any additional questions, comments or other general customer service inquiries, please email us at support@Afroute.com or call us at +233-246896111/248089578.
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>

@endsection