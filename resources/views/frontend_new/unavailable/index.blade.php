@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - বায়োডাটা পাওয়া যায়নি')

@section('css')
<style>
  .notfound-wrapper {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2rem 1rem;
    background: #f9f9ff;
  }

  .notfound-card {
    max-width: 700px;
    width: 100%;
    background: rgba(255,255,255,0.7);
    backdrop-filter: blur(6px);
    border-radius: 12px;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 4px 18px rgba(0,0,0,0.08);
  }

  .notfound-title {
    font-size: 1.8rem;
    font-weight: 700;
    background: linear-gradient(217deg, #1f0785 0%, #af2199 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1rem;
  }

  .notfound-text {
    color: #444;
    line-height: 1.8;
    margin: .5rem 0;
  }

  .notfound-btn-group {
    margin-top: 1.5rem;
    display: flex;
    justify-content: center;
    gap: .75rem;
    flex-wrap: wrap;
  }

  .notfound-btn {
    display: inline-block;
    padding: 10px 22px;
    border: none;
    border-radius: 6px;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: transform .2s ease, box-shadow .2s ease;
  }

  .notfound-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
  }

  .btn-blue  { background-color: #2F4AB3; }
  .btn-pink  { background-color: #FF2ADE; }
  .btn-deep  { background-color: #2a0e85; }

  .notfound-footer {
    margin-top: 1rem;
    font-size: .9rem;
    color: #666;
  }

  .notfound-footer a {
    color: #2a0e85;
    text-decoration: underline;
  }
</style>
@endsection

@section('content')
<div class="notfound-wrapper">
  <div class="notfound-card">
    <h1 class="notfound-title">দুঃখিত, বায়োডাটাটি বর্তমানে দেখা যাচ্ছে না</h1>

    <p class="notfound-text">
      এই বায়োডাটা (ID: <strong>{{ $id }}</strong>) এখনো
      @if($biodata && (string)$biodata->status === '0')
        <strong>রিভিউ/অনুমোদনের</strong> অপেক্ষায় রয়েছে।
      @else
        প্রকাশের যোগ্য অবস্থায় নেই বা পাওয়া যায়নি।
      @endif
    </p>

    <p class="notfound-text">
      অনুমোদন সম্পন্ন হলে আপনি এই বায়োডাটা দেখার নোটিফিকেশন পাবেন এবং ড্যাশবোর্ড থেকেও দেখতে পারবেন ইনশাআল্লাহ।
    </p>

    <div class="notfound-btn-group">
      <a href="{{ route('frontend.home') }}" class="notfound-btn btn-blue">হোমপেজে ফিরে যান</a>

      @auth('user')
      <a href="{{ route('user.dashboard') }}" class="notfound-btn btn-pink">ড্যাশবোর্ড দেখুন</a>
      @endauth

      <a href="{{ route('frontend.contact_us') }}" class="notfound-btn btn-deep">সাপোর্টে যোগাযোগ</a>
    </div>

    <p class="notfound-footer">
      প্রয়োজনে <a href="{{ route('frontend.contact_us') }}">সাপোর্ট টিমে</a> যোগাযোগ করতে পারেন।
    </p>
  </div>
</div>
@endsection
