
            <footer class="footer mt-auto py-3 bg-white text-center">
                <div class="container">
                    <span class="text-muted"> Copyright © <span id="year"></span>
                   @php
                        $apiUrll = config('app.api_base_url');
                    @endphp
                    
                    @if ($apiUrll === 'https://dummyradius-api.alburakinternet.net.pk/api' || $apiUrll === 'https://smartradapi.alburakinternet.net.pk/api')
                        <a href="https://sblinknetwork.com" target="_blank" class="text-dark fw-semibold">S.B Link</a>.
                    @else
                        <a href="https://www.facebook.com/profile.php?id=61574720728847" target="_blank" class="text-dark fw-semibold">SmartRad</a>.
                    @endif
                    </span>
                </div>
            </footer>
             <!-- JQUERY JS -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
               <script>
                                $('.jump_back').on('click', function(){
                                    
                                    let jump_back_user = "{{ session('jump_username') }}";
                                    
                                   
                 
                                        
                                         
                                             $.ajax({
                                                    url: '/jump',
                                                    method: 'POST',
                                                    data: {
                                                        username: jump_back_user,
                                                    },
                                                    success: function(response) {
                                                        console.log(response);
                                                      if(response === "1"){
                                                           $(".loadingGif").show(); // Make sure this ID exists in your HTML
                                    
                                                                // Wait for 1 second, then redirect
                                                                setTimeout(function() {
                                                                    window.location.href = "/dashboard";
                                                                }, 1000);
                                                      }
                                                      else if(response === "2"){
                                                          alert("Incorrect Password");
                                                      }
                                                    },
                                                    error: function(xhr) {
                                                        console.error(xhr.responseText);
                                                    }
                                                });
                                     })
                            </script>