@php
    $biodata = App\Models\Biodata::where(['status' => '1', 'deleted' => '0', 'admin_created' => '0'])
        ->latest()
        ->get();
@endphp

@forelse ($biodata as $data)
    <div class="mt-3">
        <div class="" dir="auto">
            <div class="d2hqwtrz r227ecj6 ez8dtbzv gt60zsk1" data-ad-comet-preview="message" data-ad-preview="message"
                id="jsc_c_gy">
                <div class="alzwoclg cqf1kptm siwo0mpr gu5uzgus">
                    <div class="jroqu855 nthtkgg5"><span
                            class="gvxzyvdx aeinzg81 t7p7dqev gh25dzvf exr7barw b6ax4al1 gem102v4 ncib64c9 mrvwc6qr sx8pxkcf f597kf1v cpcgwwas m2nijcs8 hxfwr5lz c61n2bf6 oog5qr5w tes86rjd pbevjfx6 ztn2w49o"
                            dir="auto">
                            <div class="m8h3af8h l7ghb35v kjdc1dyq kmwttqpk gh25dzvf n3t5jt4f">
                                <div dir="auto" style="text-align: start;"><span><a
                                            class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd"
                                            href="#" role="link"
                                            tabindex="0">#B0{{ $loop->index + 01 }}</a></span></div>
                                <div dir="auto" style="text-align: start;"><span><a
                                            class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd"
                                            href="#" role="link" tabindex="0">
                                            @if ($data->bride_groom == 'Bride')
                                                #পাত্রী_চাই
                                            @else
                                                #পাত্র_চাই
                                            @endif
                                        </a></span></div>
                                {{-- <div dir="auto" style="text-align: start;">পাত্রীর স্থায়ী ঠিকানাঃ <span><a
                                            class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd"
                                            href="#"
                                            role="link" tabindex="0">#পাবনা</a></span>।</div>
                                <div dir="auto" style="text-align: start;"><span><a
                                            class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd"
                                            href="#"
                                            role="link" tabindex="0">#পাত্রীর_জন্মসাল_১৯৯৬</a></span></div> --}}
                                <div dir="auto" style="text-align: start;"> POSTCODE : <span><a
                                            class="qi72231t nu7423ey n3hqoq4p r86q59rh b3qcqh3k fq87ekyn bdao358l fsf7x5fv rse6dlih s5oniofx m8h3af8h l7ghb35v kjdc1dyq kmwttqpk srn514ro oxkhqvkx rl78xhln nch0832m cr00lzj9 rn8ck1ys s3jn8y49 icdlwmnq cxfqmxzd d1w2l3lo tes86rjd"
                                            href="#" role="link" tabindex="0">#JYM2908202201</a></span></div>
                            </div>
                            <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                                <div dir="auto" style="text-align: start;"><span><a tabindex="-1"></a></span>
                                    @if ($data->bride_groom == 'Bride')
                                        পাত্রীর
                                    @else
                                        পাত্রর
                                    @endif
                                    ব্যক্তিগত তথ্য:
                                </div>
                                <div dir="auto" style="text-align: start;">০১. Name *: {{ $data->name }}</div>
                                <div dir="auto" style="text-align: start;">০২. Father Name *:{{ $data->fatherName }}
                                </div>
                                <div dir="auto" style="text-align: start;">০৩. Father's Occupation*:
                                    {{ $data->fatherOccupation }}</div>
                                <div dir="auto" style="text-align: start;">০৪. Mother's Name*:
                                    {{ $data->motherName }}</div>
                                <div dir="auto" style="text-align: start;">০০. Mother's Occupation:
                                    {{ $data->motherOccupation }}</div>
                                <div dir="auto" style="text-align: start;">০৫. Permanent Address*:
                                    {{ $data->permanentAddress }}</div>
                                <div dir="auto" style="text-align: start;">০৬. Present Address*:
                                    {{ $data->presentAddress }} </div>
                                <div dir="auto" style="text-align: start;">৬.১. Date of Birth*:
                                    {{ $data->dateOfBirth }}</div>
                                <div dir="auto" style="text-align: start;">০৭. Height *:
                                    {{ $data->heightFt }}'{{ $data->heightInch }}" Inch</div>
                                <div dir="auto" style="text-align: start;">০৮. Weight *: {{ $data->weight }} KG
                                </div>
                                <div dir="auto" style="text-align: start;">০০. Complexion : {{ $data->complexion }}
                                </div>
                                <div dir="auto" style="text-align: start;">০০. Blood Group :
                                    {{ $data->blood_groop }}</div>
                                <div dir="auto" style="text-align: start;">০৯. Educational Qualification *:
                                    {{ $data->educationalQualification }}
                                </div>
                                <div dir="auto" style="text-align: start;">১০. Occupation *:
                                    {{ $data->occupationWant }}</div>
                                <div dir="auto" style="text-align: start;">১১. Maritual Status*:
                                    {{ $data->maritualStatusWant }}</div>
                                <div dir="auto" style="text-align: start;">০০. Political:
                                    {{ $data->politicalView }}</div>
                                <div dir="auto" style="text-align: start;">১২. Majhab *: {{ $data->majhab }}</div>
                                <div dir="auto" style="text-align: start;">০০. Something About Yourself :
                                    {{ $data->aboutYourself }} </div>
                                <div dir="auto" style="text-align: start;">
                                    ---------------------------------------------------------</div>
                                {{-- <div dir="auto" style="text-align: start;">পারিবারিক তথ্য:</div>
                                <div dir="auto" style="text-align: start;">১৩. ভাই - বোন*: ভাই নেই, ২ বোন।</div>
                                <div dir="auto" style="text-align: start;">ক. পাত্রী নিজে।</div>
                                <div dir="auto" style="text-align: start;">খ. বোন- ২য় বর্ষে অধ্যয়নরত, হাজী মোহাম্মদ
                                    দানেশ বিজ্ঞান প্রযুক্তি বিশ্ববিদ্যালয়ে।</div>
                                <div dir="auto" style="text-align: start;">১৪. পারিবারিক অবস্থা *: মধ্যবিত্ত। সামাজিক
                                    অবস্থা সম্মানজনক আলহামদুলিল্লাহ্। </div>
                                <div dir="auto" style="text-align: start;">০০. চাচা মামাদের পেশা: চাচা ১ জন- উপজেলা
                                    নির্বাচন অফিসার। মামা ১ জন বিএসইসি সুপারভাইজার।</div> --}}
                            </div>
                            <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                                <div dir="auto" style="text-align: start;">
                                    ---------------------------------------------------------</div>
                            </div>
                            {{-- <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                                <div dir="auto" style="text-align: start;">পাত্রী সম্পর্কে প্রাথমিক ধারণা:</div>
                                <div dir="auto" style="text-align: start;">০০. বিয়ের সম্পর্কে ধারণা:</div>
                                <div dir="auto" style="text-align: start;">১৫. পর্দা*: পর্দা করি, (বোরকা, হিজাব,
                                    নিকাব) মাহরাম নন-মাহরাম মেনে চলার চেষ্টা করি। </div>
                                <div dir="auto" style="text-align: start;">১৬. বিয়ের পর আপনি কি চাকরি করতে ইচ্ছুক?*:
                                    চেষ্টা করতে চাই, তবে পরিবারের ইচ্ছা প্রাধান্য পাবে।</div>
                                <div dir="auto" style="text-align: start;">০০. টিভি দেখেন বা গান শুনেন? : না। </div>
                                <div dir="auto" style="text-align: start;">১৭. শুদ্ধভাবে কুরআন তিলাওয়াত করতে পারেন?*:
                                    জ্বি।</div>
                                <div dir="auto" style="text-align: start;">১৮. মানসিক বা শারিরিক কোনো সমস্যা আছে কি?*:
                                    না।</div>
                                <div dir="auto" style="text-align: start;">১৯. পাঁচ ওয়াক্ত নামাজ পড়া হয় কি?*: জ্বি।
                                </div>
                                <div dir="auto" style="text-align: start;">
                                    --------------------------------------------------------</div>
                            </div>
                            <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                                <div dir="auto" style="text-align: start;">যেমন পাত্র চাই:</div>
                                <div dir="auto" style="text-align: start;">২০. বয়স*: ৩২ বছরের ভিতরে।</div>
                                <div dir="auto" style="text-align: start;">০০. গাত্রবর্ণ: যেকোনো।</div>
                                <div dir="auto" style="text-align: start;">২১. উচ্চতা*: ৫'৬" </div>
                                <div dir="auto" style="text-align: start;">২২. ওজন*: মানানসই।</div>
                                <div dir="auto" style="text-align: start;">২৩. বৈবাহিক অবস্থা*: অবিবাহিত।</div>
                                <div dir="auto" style="text-align: start;">২৪. শিক্ষা*: পাবলিক বিশ্ববিদ্যালয় থেকে
                                    অনার্স/মাস্টার্স সম্পন্ন। (দ্বীনি বুঝ সম্পন্ন) যেহেতু আমি নিজে জেনারেল থেকে পড়াশোনা ,
                                    তাই মনে করি মানসিকতা মিলের জন্য এমন ব্যাকগ্রাউন্ড ভালো হবে।</div>
                                <div dir="auto" style="text-align: start;">০০. জেলা: যেকোনো (উত্তরবঙ্গ/ঢাকা/এর
                                    আশেপাশের জেলা হলে ভালো) </div>
                                <div dir="auto" style="text-align: start;">২৫. বর্তমান ঠিকানা*: যেকোনো।</div>
                                <div dir="auto" style="text-align: start;">০০. পেশা: সম্মানজনক, সরকারি /স্বায়ত্বশাসিত
                                    প্রতিষ্ঠানের চাকরিতে কর্মরত।</div>
                                <div dir="auto" style="text-align: start;">০০. বিশেষ গুনাগুন: দ্বীনদার, মিশুক, পরস্পর
                                    মাশোয়ারা করে চলার মতো মনমানসিকতা থাকা, দ্বীনের বিষয়ে একে অন্যের সহযোগী হওয়া।</div>
                                <div dir="auto" style="text-align: start;">
                                    ---------------------------------------------------------</div>
                            </div>
                            <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                                <div dir="auto" style="text-align: start;">যোগযোগ মাধ্যম:</div>
                                <div dir="auto" style="text-align: start;">২৬. আপনার বিয়ে সম্পর্কে গার্জিয়ান জানেন কি?
                                    *: জ্বি।</div>
                                <div dir="auto" style="text-align: start;">২৭. মুসলিম বিয়ে পোস্ট দেওয়ার বিষয়টি
                                    অভিভাবকদের জানিয়েছেন?*: জ্বি।</div>
                                <div dir="auto" style="text-align: start;">২৮. যোগাযোগের নাম্বার*:</div>
                                <div dir="auto" style="text-align: start;"> 01716726250 (বাবা)</div>
                                <div dir="auto" style="text-align: start;">০০. ইমেইল এড্রেস :</div>
                                <div dir="auto" style="text-align: start;"> fariafatema6@gmail.com</div>
                                <div dir="auto" style="text-align: start;">
                                    ---------------------------------------------------------</div>
                            </div>
                            <div class="l7ghb35v kjdc1dyq kmwttqpk gh25dzvf jikcssrz n3t5jt4f">
                                <div dir="auto" style="text-align: start;">বিশেষ দ্রষ্টব্য :</div>
                                <div dir="auto" style="text-align: start;">* বায়োডাটা পছন্দ হলে আর রিকোয়ারমেণ্ট
                                    অনুযায়ী মিললে তবেই ফোন করুন।</div>
                                <div dir="auto" style="text-align: start;">* বায়োডাটা মেইল করার পর অবশ্যই ফোনে কনফার্ম
                                    করুন।</div>
                                <div dir="auto" style="text-align: start;">* বিয়ে হওয়ার পূর্বে অথবা অভিভাবকের অনুমতি
                                    ব্যতিত কখনোই ছবি আদানপ্রদান করবেন না।</div>
                            </div> --}}
                        </span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="biodata_image mt-2">
        <img style="width: 100%" src="{{ $data->image }}">
    </div>
    <hr>
@empty
    No Biodata Found
@endforelse
