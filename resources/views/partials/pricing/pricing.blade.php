
    <div class="title  margin-bottom-5 text-center">
        <h2>Pricing</h2>
    </div>

    <!-- Tabs with icons on Card -->
    <div class="card card-nav-tabs margin-top-10">
        <ul class="nav nav-pills nav-justified" data-tabs="tabs">
            <li class="active">
                <a href="#contract" data-toggle="tab">
                    <i class="material-icons">event</i>
                    24 Months Contract packages
                </a>
            </li>
            <li>
                <a href="#prepaid" data-toggle="tab">
                    <i class="material-icons">autorenew</i>
                    Prepaid Offers
                </a>
            </li>

        </ul>

        <div class="content">
            <div class="tab-content text-center">
                <div class="tab-pane active" id="contract">
                   @include('partials.pricing.contracts')
                </div>
                <div class="tab-pane" id="prepaid">
                    @include('partials.pricing.prepaid')
                </div>

            </div>
            
            <div class="row sharing-area text-center">
	                
						<a href="#" class="btn btn-just-icon btn-twitter">
	                        <i class="fa fa-twitter"></i>
	                    </a>
						<a href="#" class="btn btn-just-icon btn-facebook">
	                        <i class="fa fa-facebook"></i>
	                    </a>
						<a href="#" class="btn btn-just-icon btn-google-plus">
	                        <i class="fa fa-google-plus"></i>
	                    </a>
						
	            </div>
        </div>
    </div>


