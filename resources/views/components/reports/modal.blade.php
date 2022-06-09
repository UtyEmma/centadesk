<div>
    <h6 class="d-flex align-items-center"><i class="icofont-warning fs-5 me-2"></i> Do you have any complaints?</h6>
    <p><small>Report any complaints or issues you may have with your session or the Mentor and we will handle it accordingly.</small></p>
    <p class="alert alert-warning radius text-muted"><small>Please note that this medium must be used for genuine complaints only. Abusing this medium will result in a ban on your account.</small></p>
</div>

<div class="reviews-btn w-100 pt-3">
    <button type="button" class="btn w-100 btn-primary btn-hover-dark" style="font-size: 14px; line-height: 3.5;" data-bs-toggle="modal" data-bs-target="#reportsModal">Report this Session</button>
</div>

<!-- Reviews Form Modal Start -->
<div class="modal fade" id="reportsModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Write a Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Reviews Form Start -->
            <div class="modal-body reviews-form">
                <form action="/reports/create/{{$batch->unique_id}}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="single-form">
                                <textarea placeholder="Write your comments here" name="report"></textarea>
                                <x-errors name="report" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single-form">
                                <button type="submit" class="btn btn-primary btn-hover-dark">Submit Review</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Reviews Form End -->
        </div>
    </div>
</div>
