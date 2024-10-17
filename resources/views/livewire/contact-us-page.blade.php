<div>
    <div class="contact-area-info section-padding-0-100">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Contact Thumbnail -->
                <div class="col-12 col-md-6">
                    <div class="contact--thumbnail">
                        <img src="img/bg-img/25.jpg" alt="">
                    </div>
                </div>

                <div class="col-12 col-md-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>CONTACT US</h2>
                        <p>We are improving our services to serve you better.</p>
                    </div>
                    <!-- Contact Information -->
                    <div class="contact-information">
                        <p><span>Address:</span> South Kumrakhali, Masjid Bari Road, Kamalgazi, 700103</p>
                        <p><span>Phone:</span> +91 8100036170</p>
                        <p><span>Email:</span>rohit171209@gmail.com</p>
                        <p><span>Open hours:</span> Mon - Sun: 8 AM to 9 PM</p>
                        {{-- <p><span>Happy hours:</span> Sat: 2 PM to 4 PM</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>GET IN TOUCH</h2>
                        <p>Send us a message, we will call back later</p>
                    </div>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area mb-100">
                        <form wire:submit.prevent="submit">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" wire:model="name" id="contact-name"
                                            placeholder="Your Name">
                                        @error('name')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" wire:model="email" id="contact-email"
                                            placeholder="Your Email">
                                        @error('email')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" wire:model="subject"
                                            id="contact-subject" placeholder="Subject">
                                        @error('subject')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" wire:model="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                        @error('message')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button wire:loading.attr="disabled" type="submit" class="btn alazea-btn mt-15">

                                        <span wire:loading>Submitting...</span>
                                        <span wire:loading.remove>
                                            Send Message
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <x-adminlte-modal id="contactSuccessModal" title="Thanks for Contacting Us" theme="success"
                    icon="fas fa-bolt" size='lg' v-centered>
                    <p>We have received your message and will get back to you as soon as possible.</p>
                </x-adminlte-modal>
                <div class="col-12 col-lg-6">
                    <!-- Google Maps -->
                    <div class="map-area mb-100">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d921.8662580063977!2d88.39776069816023!3d22.449152585675947!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1729148104501!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

        @script
            <script>
                $wire.on('show-success-modal', () => {

                    $('#contactSuccessModal').modal('show');

                });
            </script>
        @endscript
