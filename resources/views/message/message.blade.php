<div class="modal fade" id="contactAdvertiser" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class=" icon-mail-2"></i> {{ __('home.contact_advertiser') }} </h4>

                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
            </div>
            <form method="post" action="{{ route('message.send') }}">
                @csrf
            <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">{{ __('role.role_name') }}:</label>
                        <input class="form-control required @error('sender') is-invalid @enderror" id="recipient-name" placeholder="{{ __('home.your_name') }}"
                               data-placement="top" data-trigger="manual" value="{{ old('sender') }}"
                               data-content="Must be at least 3 characters long, and must only contain letters."
                               type="text" name="sender">
                               @error('sender')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                    </div>
                    <div class="form-group">
                        <label for="sender-email" class="control-label">E-mail:</label>
                        <input id="sender-email" type="email" name="email" value="{{ old('email') }}"
                               data-content="Must be a valid e-mail address (user@gmail.com)" data-trigger="manual"
                               data-placement="top" placeholder="email@you.com" class="form-control email @error('email') is-invalid @enderror">
                               @error('email')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror

                    </div>
                    <div class="form-group">
                        <label for="recipient-Phone-Number" class="control-label">{{ __('home.Phone_Number') }}:</label>
                        <input type="text" maxlength="60" class="form-control @error('mobile') is-invalid @enderror" 
                        id="recipient-Phone-Number" name="mobile" value="{{ old('mobile') }}">
                        @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="control-label">Message <span class="text-count">(300) </span>:</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="message-text" placeholder="{{ __('home.your_message') }}.."
                                  data-placement="top" data-trigger="manual" name="content" value="{{ old('content') }}"></textarea>
                                  @error('content')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
   
                    </div>
                    <div class="form-group">
                        <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not
                            valid. </p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('button.close_button') }}</button>
                <button type="submit" class="btn btn-success pull-right">{{ __('home.send_message') }}!</button>
            </div>
        </form>

        </div>
    </div>
</div>
{{-- <script>
    $(document).ready(function() {
        @if (count($errors) > 0)
            $('#contactAdvertiser').modal('show');
        @endif
    });
</script> --}}

