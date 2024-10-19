<div>
   

    <section class="contact-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-6 offset-lg-4">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>LOGIN</h2>
                        {{-- <p>Send us a message, we will call back later</p> --}}
                    </div>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area mb-100">
                        <form wire:submit.prevent="submit">
                            @csrf
                            <div class="row">
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" wire:model="username"
                                            id="customer-username" placeholder="Subject">
                                        @error('username')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" wire:model="password"
                                            id="customer-password" placeholder="Subject">
                                        @error('password')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                               
                                <div class="col-12">
                                    <button wire:loading.attr="disabled" type="submit" class="btn alazea-btn mt-15">

                                        <span wire:loading>Submitting...</span>
                                        <span wire:loading.remove>
                                           Submit
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
                <div class="col-12 col-lg-12">
                    <!-- Google Maps -->
                    <div class="map-area mb-100">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

        @script
            <script>
            
            </script>
        @endscript
