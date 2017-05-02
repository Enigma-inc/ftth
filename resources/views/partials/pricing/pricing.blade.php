
    <div class="title margin-top-5 margin-bottom-5 text-center">
        <h2>FTTH Pricing</h2>
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
        </div>
    </div>


