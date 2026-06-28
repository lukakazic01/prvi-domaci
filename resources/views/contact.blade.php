<x-layout>
    <x-slot:title>Contact</x-slot:title>
    @if ($hour >= 0 && $hour <= 12)
        <p>Good morning!</p>
    @else
        <p>Good afternoon!</p>
    @endif
    <p>Current hour's: {{ $hour }}h</p>
    <p>Current time is: {{ $currentTime }}</p>
    <div class="flex flex-col gap-2 items-center mt-6">
        <p class="font-bold text-gray-700 text-2xl">You have a question?</p>
        <p class="font-semibold text-gray-700 text-xl">We are here for all your doubts :)</p>
    </div>
    <div class="flex justify-center gap-6 mt-10">
        <form class="max-w-150 w-full border border-gray-200 rounded flex flex-col gap-4 p-4">
           <x-forms.field name="email" required class="flex flex-col gap-2">
              <x-forms.label>Email</x-forms.label>
              <x-forms.input />
           </x-forms.field>
            <x-forms.field name="subject" required class="flex flex-col gap-2">
                <x-forms.label>Subject</x-forms.label>
                <x-forms.input />
            </x-forms.field>
            <x-forms.field name="message" required class="flex flex-col gap-2">
                <x-forms.label>Message</x-forms.label>
                <x-forms.input />
            </x-forms.field>
            <div class="grow items-end w-full flex">
                <x-base.button type="submit">Submit</x-base.button>
            </div>
        </form>
        <iframe class="rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5667.272082066414!2d20.44864654860883!3d44.747441654099255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7198ad2f465f%3A0x7e09b29e2552c67!2sMiljakovac%2C%20Belgrade!5e0!3m2!1sen!2srs!4v1782321588185!5m2!1sen!2srs" width="600" height="380" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
    </div>
</x-layout>
