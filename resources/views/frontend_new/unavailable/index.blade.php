@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - বায়োডাটা পাওয়া যায়নি')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center px-4">
  <div class="max-w-xl w-full text-center bg-white/70 backdrop-blur rounded-xl p-6 shadow">
    <h1 class="text-2xl font-bold"
        style="background: linear-gradient(217deg, #1f0785 0%, #af2199 100%);
               -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
      দুঃখিত, বায়োডাটাটি বর্তমানে দেখা যাচ্ছে না
    </h1>

    <p class="text-gray-700 mt-3 leading-7">
      এই বায়োডাটা (ID: <span class="font-semibold">{{ $id }}</span>) এখনো
      @if($biodata && (string)$biodata->status === '0')
        <span class="font-semibold">রিভিউ/অনুমোদনের</span> অপেক্ষায় রয়েছে।
      @else
        প্রকাশের যোগ্য অবস্থায় নেই বা পাওয়া যায়নি।
      @endif
    </p>

    <p class="text-gray-700 mt-2 leading-7">
      অনুমোদন সম্পন্ন হলে আপনি এই বায়োডাটা দেখার নোটিফিকেশন পাবেন এবং ড্যাশবোর্ড থেকেও দেখতে পারবেন ইনশাআল্লাহ।
    </p>

    <div class="mt-6 flex items-center justify-center gap-3">
      <a href="{{ route('frontend.home') }}"
         class="inline-flex items-center justify-center px-5 py-3 rounded-lg font-semibold text-white
                bg-gradient-to-r from-[#1f0785] to-[#af2199] shadow-md hover:shadow-lg
                hover:from-[#2a0db0] hover:to-[#c63bb2] transition-all">
        হোমপেজে ফিরে যান
      </a>

      @auth('user')
        <a href="{{ route('user.dashboard') }}"
           class="inline-flex items-center justify-center px-5 py-3 rounded-lg font-semibold text-[#1f0785]
                  bg-white border border-[#1f0785]/20 hover:border-[#1f0785]/40 hover:shadow transition-all">
          ড্যাশবোর্ড দেখুন
        </a>
      @endauth
    </div>

    <p class="text-gray-500 text-sm mt-4">
      প্রয়োজনে <a href="{{ route('frontend.contact_us') }}" class="underline">সাপোর্টে যোগাযোগ</a> করতে পারেন।
    </p>
  </div>
</div>
@endsection
