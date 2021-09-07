<div class="modal fade shareAd" id="shareAd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Share This Ad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <a href="{{ route('social.index', $job->id) }}" target="_blank"><i class="fab fa-facebook-square ml-3"></i> Facebook</a>
        <a href="{{ route('social.twitter', $job->id) }}" target="_blank"><i class="fab fa-twitter ml-3"></i> Twitter</a>
        <a href="{{ route('social.linkedin', $job->id) }}" target="_blank"><i class="fab fa-linkedin-in ml-3"></i> LinkedIn</a>
        <a href="{{ route('social.whatsapp', $job->id) }}" target="_blank"><i class="fab fa-whatsapp ml-3"></i> WhatsApp</a>
        <a href="{{ route('social.telegram', $job->id) }}" target="_blank"><i class="fab fa-telegram ml-3"></i> Telegram</a>
        </div>
    </div>
    </div>
</div>
