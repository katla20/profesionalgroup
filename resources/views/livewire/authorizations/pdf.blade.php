<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
</head>
<style type="text/css">
body, div, span,
h1, h2, h3, h4, h5, h6, p,
dl, dt, dd, ol, ul, li,
table, caption, tbody, tfoot, thead, tr, th, td, {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}

html{
    margin: 10px; 
}

body {
	line-height: 1;
    color: #3D3D3D;
    font-family: 'dejavu sans'
}
ul {
	list-style-type: none;
   /* border: 1px solid black;*/
}

table {
	border-collapse: collapse;
	border-spacing: 0;
}


    span,p{
        text-transform: uppercase;
        font-size: 0.6em;
        font-family: 'dejavu sans'
    }

    li {
        display: inline-block;
        /*border: 1px solid red;*/
        padding-left: 2px;
        margin-left: 5px;
    }
    .color-input{
        background-color: #b5b4b1;
        padding-right: 4px;
        padding-left: 4px;
        
    }
    .container{
        border: 4px solid #E5E4E2;
        border-radius: 15px;
        height:98%;
    }
    hr{
        border: 2px solid #E5E4E2;
        margin-top: 1px;
        margin-bottom: 1px;
    }
    .legend{
        text-transform: uppercase;
        margin-left: 5px;


    }
    .boldfont{
        text-decoration: underline;
        text-transform: uppercase;
        font-weight: 800;
        font-size: 1em;

    }
    
    .logo{
        position:absolute;
        z-index:3;
        top:5px;
        left:32em;
        max-height:80px; 
    }

    img {
    object-fit: contain;
    height: auto;
    max-width: 100%;
    }

    p{
        font-size: 0.5.5em;
        text-align: justify;
        line-height: normal;
    }
    .div_terms{
        padding-right: 6px;
        padding-left: 6px;
    }
    .signature{
        height: 60px;
        width: 80px;
    }

</style>
<body>
    <div class="container">
        <div class="legend" style="margin-top: 25px;margin-bottom: 25px;">
            <center><strong><span>{{ __('MICROPIGMENTATION') }}</span></strong></center>
            <img class="logo" 
                src="{{ $authDetails['user']['logo_base64']}} " />
        </div>
        <div class="legend">
            <strong><span>{{ __('CONTACT DETAILS') }}</span></strong>
        </div>
        <hr>
        <div>
            <ul style="padding-top: 8px;">
                <li>
                    <span>{{ __('Date') }}</span>
                    <span class="color-input">{{ date('d-M-y', strtotime($authDetails['proceeded_date'])) }}</span>
                </li>
                <li>
                    <span>{{ __('DOB') }}</span>
                    <span class="color-input">{{ isset($authDetails['client']['dob']) ? date('d-M-y', strtotime($authDetails['client']['dob'])) : '_______' }}</span>
                </li>
                <li>
                    <span>{{ __('Age') }}</span>
                    <span class="color-input">{{ isset($authDetails['client']['dob']) ? $authDetails['client']['age'] : '_______' }}</span>
                </li>
                <li>
                    <span>{{ __('Occupation') }}</span>
                    <span class="color-input">{{ isset($authDetails['client']['occupation']) ? $authDetails['client']['occupation'] : '_______' }}</span>
                </li>
            </ul>
        </div>
        <div>
            <ul>
                <li>
                    <span>{{ __('Fullname') }}</span>
                    <span class="color-input">{{ isset($authDetails['client']['fullname']) ? $authDetails['client']['fullname'] : '_______' }}</span>
                </li>
                <li>
                    <span>{{ __('Email') }}</span>
                    <span class="color-input">{{$authDetails['client']['email']}}</span>
                </li>
                <li>
                    <span>{{ __('phone') }}</span>
                    <span class="color-input">{{ isset($authDetails['client']['phone']) ? $authDetails['client']['phone'] : '_______' }}</span>
                </li>
            </ul>
        </div>
        <div>
            <ul>
                <li>
                    <span>{{ __('Address') }}</span>
                    <span class="color-input">{{ isset($authDetails['client']['address']) ? $authDetails['client']['address'] : '_______' }}</span>
                </li>
                <li>
                    <span>{{ __('City and Zipcode') }}</span>
                    <span class="color-input">{{ isset($authDetails['client']['citycode']) ? $authDetails['client']['citycode'] : '_______' }}</span>
                </li>
                <li>
                    <span>{{ __('Know about us by') }}</span>
                    <span class="color-input">{{ isset($authDetails['client']['knowabout']) ? $authDetails['client']['knowabout'] : '_______' }}</span>
                </li>
            </ul>
        </div>
        <hr>
        <div class="legend">
            <strong><span>{{ __('Reason for Consultation') }}</span></strong>
        </div>
        <hr>
        <div>
            <ul style="padding-top: 2px;padding-bottom: 4px;">
            @foreach ($authDetails['reason'] as $key => $value)
                <li>
                    <span class="color-input">{{$key}}</span>
                </li>
            @endforeach
            </ul>
        </div>
        @isset($authDetails['history'])
        <hr>
        <div>
            <strong><span class="legend">{{ __('PATHOLOGICAL HISTORY') }}</span></strong>
        </div>
        <div>
            <span style="font-size: 0.5em;margin-left: 5px;">{{ __('BEAR IN MIND THAT THOSE THAT APPEAR WHIT * ARE CONTRAINDICATIONS') }}</span>
        </div>
        <hr>
        <div>
            <ul style="padding-top: 8px;">
            @foreach ($authDetails['history'] as $key => $value)
                <li>
                    <span class="color-input">{{$key}}</span>
                </li>
            @endforeach
            </ul>
        </div>
        @endisset
        <hr>
        <div>
            <strong><span class="legend">{{ __('PHYSICAL EXAM') }}</span></strong>
        </div>
        <hr>
        <div style="margin-left:5px;">
            <span>{{ __('SKIN TYPE: ') }}</span><span class="color-input">{{$authDetails['skin_type']}}</span>
        </div>
        <hr>
        <div>
            <strong><span class="legend">{{ __('COLOR USED') }}</span></strong>
        </div>
        <hr>
        <div>
            <ul>@isset($authDetails['color_eyebrows'])
                    <li>
                        <span>{{ __('eyebrows') }}</span>
                        <span class="color-input">{{$authDetails['color_eyebrows']}}</span>
                    </li>
                @endisset
                @isset($authDetails['color_eyerline'])
                    <li>
                        <span>{{ __('eyerline') }}</span>
                        <span class="color-input">{{$authDetails['color_eyerline']}}</span>
                    </li>
                @endisset
                @isset($authDetails['color_lips'])
                    <li>
                        <span>{{ __('lips') }}</span>
                        <span class="color-input">{{$authDetails['color_lips']}}</span>
                    </li>
                @endisset
                @isset($authDetails['color_touchup'])
                    <li>
                        <span>{{ __('touchup') }}</span>
                        <span class="color-input">{{$authDetails['color_touchup']}}</span>
                    </li>
                @endisset
                @isset($authDetails['color_other'])
                    <li>
                        <span>{{ __('other') }}</span>
                        <span class="color-input">{{$authDetails['color_other']}}</span>
                    </li>
                @endisset
            </ul>
        </div>
        <div style="margin-top:5px;margin-left: 4px; margin-bottom: 6px">
            @isset($authDetails['color_observation'])
                <span>{{ __('observation') }}</span>
                <span class="color-input">{{$authDetails['color_observation']}}</span>
            @endisset
        </div>
        <div style="margin-bottom: 6px;" class="div_terms">
            <p style="">
                    MICROPIGMENTATION IS A PROCEDURE THAT USUALLY REQUIRES SEVERAL SESSIONS TO ACHIEVE THE DESIRED RESULTS AND, IN A LOW PERCENTAGE, THESE ARE NOT ACHIEVED BY
                100% WITH <span class="boldfont">({{$authDetails['reason_string']}})</span>, YOU WILL OBTAIN LONG LASTING RESULTS THAT, UNDER PROPER SKIN CARE, WILL NOT CHANGE COLOR BUT IF IT CLEARS UP AS A RESULT OF
                AGE, PROLONGED EXPOSURE TO THE SUN, CHLORINATED AND/OR SALTY WATER AN THE PASSING OF YEARS YOU SHOULD BEAR IN MIND THAT DEPENDING ON YOUR PIGMENTATION
                AND LIFESTYLE, THE COLOR MUST BE REAFFIRMED EVERY SO OFTEN TO MAINTAIN THE IDEAL COLOR. IF YOUR SKIN IS OILY. THE COLOR IS LIKELY TO LOOK UNEVEN
            </p>
        </div>
        <div style=margin-bottom:5px">
            <center><strong><span class="legend">{{ __('AUTHORIZATION FOR PROCEDURES') }}</span></strong></center>
        </div>
        <div style="margin-bottom: 10px" class="div_terms">
            <p style="">
                    I <span class="boldfont">{{$authDetails['client']['fullname']}}</span>, AUTHORIZE <span class="boldfont">{{$authDetails['user']['name']}}</span> ,PERFORM THE FOLLOWING PROCEDURE <span class="boldfont">{{$authDetails['reason_string']}}</span> 
                AND I AFFIRM THAT THE PROCEDURE HAS BEEN EXPLAINED TO ME INCLUDING THE RISKS AND COMPLICATIONS DURING AND AFTER THE TREATMENT. I RELEASE IT FROM ALL RESPONSIBILITY FOR PROBLEMS THAT ARISE DUE TO
                CAUSES OF MY SKIN AND UNRELATED TO THE PROCEDURE ITSELF OR FOR NOT FOLLOWING THE RECOMMENDATIONS AS INSTRUCTED. IT HAS INDICATED, I ALSO UNDERSTAND THAT AS
                PART OF THE PROCEDURE MUST COMPLY WITH THE COMPLETION OF THE RETOUCH WHICH IS CARRIED OUT 45 DAYS AFTER THE PROCEDURE HAS BEEN PERFORMED FOR THE FIRST TIME.
                IN CASE OF NON-COMPLIANCE WITH THE APPOINTMENT OF THE RETOUCH, ACCEPT THAT THE FINAL RESULTS MAY BE AFFECTED DUE THE NON-COMPLETION OF THE ENTIRE PROCESS.
                I AM CLEAR THAT HAVE TATTOOS IN THE AREA WHERE THE PROCEDURE WILL BE PERFORMED, THE RESULTS MAY BE, THE RESULTS MAY BE AFFECTED AND MAY NEED TO HAVE SEVERAL
                TOUCHVUPS TO OBTAIN THE EXPECTED RESULTS I AUTHORIZE TO TAKE THE NECESSARY PHOTOGRAPHS TO HAVE CONTROL OF BEFORE AND AFTER THE TREATMENT. I CERTIFY THAT HAVE
                READ, THE EXPLAINED TO ME AND THAT UNDERSTAND THAT THE TREATMENT HAS A PROCESS, AND THE FINAL RESULT DEPENDS ON A COMBINATION OF FACTORS SUCH AS MY PIGMENV
                TATION AND THE ACCEPTANCE OF THE COLOR THAT MY SKIN HAS
            </p>
            <br>
            <p style="">
                I ACCEPT THE COST OF THE TREATMENT $<span class="boldfont">{{$authDetails['cost_treatment']}}</span> I AM ALSO CLEAR THAT THE COST OF THE RETOUCH IS NOT INCLUDED IN THE PRICE TO PAY IN THE FIRST PROCEDURE AND UNDERSTAND THAT NO REFUND OF THE MONEY IS MADE AFTER IT HAS BEEN PERFORMED.
            </p>
        </div>
        <hr>
        <div style=margin-bottom:5px">
            <center><strong><span class="legend">{{ __('CLIENT CONSENT FOR TREATMENT') }}</span></strong></center>
        </div>
        <div style="margin-bottom: 10px;" class="div_terms">
            <p style="">
                I <span class="boldfont">{{$authDetails['client']['fullname']}}</span> HEREBY GIVE MY CONSENT TO <span class="boldfont">{{$authDetails['user']['name']}}</span>
                TO PERFORM <span class="boldfont">{{$authDetails['reason_string']}}</span> I ACKNOWLEDGE THIS TECHINE AND THE ALTERNATIVES HAS BEEN FULLY EXPLAINED TO ME.
                I HAVE FULLY DISCLOSED MY MEDICAL HISTORY AND COMPLEELY ANSWERED ALL SPECIFIC HEALTH QUESTIONS.
                I UNDERSTAND THIS TECHNIQUE MAY INVOIVE CERTAIN RISKS OF MINOR OR TEMPORARY BRUISING REDNESS SWELLING OF THE SKIN, AND THE POSSIBILITIES OF A SENSITIVE REACTION.
                ALL THE RISKS HAVE BEEN EXPLAINED TO ME AND I ACCEPT THEM.
                I AM AWARE THE RESULT ACHIEVED BY THIS TREATMENT MAY VARY FROM PERSON TO PERSON, AND I ACKNOWLEDGE THAT NO PROMISES OR GUARANTEES HAVE BEEN MADE TO ME
                AS A RESULT OF THE TREATMENT.
                I HAD THE OPPORTUNITY TO ASK QUESTIONS AND MY QUESTIONS HAVE BEEN FULLY ANSWERED TO ME IN FULL SATISFACTION.
                I HAVE BEEN ADVISED OF THE PRODUCTS THAT I NEED USED WHLIE GOING UNDER TREATMENT.
                I HAVE BEEN ADVISED OF THE PRODUCTS THAT I NEED USED WHILE GOING UNDER TREATMENT.
                I HEREBY GIVE MY VOLUNTARY CONSENT TO HAVE THIS TREATMENT PERFORMED ON ME.
            </p>
        </div>
        <div>
            <div>
                <ul>
                    <li>
                        <span>{{ __('SIGNED BY CLIENT') }}</span>
                        <img class="signature" src="{{$authDetails['signature_client']}}" />
                    </li>
                    <li> 
                        <span>{{ __('SIGNED BY ESTHETICIAN') }}</span>
                        <img class="signature" src="{{$authDetails['user']['signature_user']}}" />
                    </li>
                    <li>
                        <span>{{ __('DATE') }}:</span>
                        <span class="legend">{{ date('d-M-y', strtotime($authDetails['proceeded_date'])) }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        @isset($authDetails['image_release'])
        <div style=margin-bottom:5px,margin-top:10px">
            <center><strong><span class="legend">{{ __('IMAGE RELEASE FORM') }}</span></strong></center>
        </div>
        <div style="margin-bottom: 10px" class="div_terms">
            <p id="">
                I <span class="boldfont">{{$authDetails['client']['fullname']}}</span> hereby consent to and authorize the use by <span class="boldfont">{{$authDetails['user']['name']}}</span>, of any and all photographs, video, voice recordings, or other media taken of me including derivative works thereof (collectively, the "images"), and any reproduction of them in any form in any media whatsoever, whether now known or hereafter created, throughout the world in perpetuity.
                I hereby release and discharge {{$authDetails['user']['name']}}, its trustees, officers, employees, licensees. And affiliates from ary and all claims, actions, suits or demands of any kind nature whatsoever, in connection with the use of images and the reproduction thereo as aforesaid.
                I understand and agree that, {{$authDetails['user']['name']}} will be the exclusive owner of all rights, including, but not limited to, all copyrights, in and to the images in whole or part, throughout the universe, in perpetuity, in any medium now known or hereafter developed, and to license other to so use them in any manner {{$authDetails['user']['name']}}, may determine in its sole discretion, without any obligation to me.
                I hereby waive any right that may have to inspect and/or approve the use of the images or any reproductions thereof, by {{$authDetails['user']['name']}}
            </p>
        </div>
        <div>
            <div>
                <ul>
                    <li> 
                        <span>{{ __('SIGNATURE BY ')}}<span class="boldfont">{{$authDetails['client']['fullname']}}</span></span>
                        <img class="signature" src="{{$authDetails['signature_client']}}" />
                    </li>
                    <li>
                        <span>{{ __('DATE') }}:</span>
                        <span class="legend">{{ date('d-M-y', strtotime($authDetails['proceeded_date'])) }}</span>
                    </li>
                </ul>
            </div>
        </div>
        @endisset
    </div>   
</body>
</html>