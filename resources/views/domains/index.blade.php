@extends('layouts.app')
@section('title', 'Domains')
@section('content')
    <?php
    /**
     * Makes the word only have the first character uppercase
     *
     * @param String $str
     * @return string
     */
    function fixCase(String $str) {
        return ucfirst(strtolower($str));
    }
    ?>

    <div class="domain-header">
        <div class="heading h3">
            Domains
        </div>
        <div class="domain-actions">
            <span id="create-domain-action" class="action">+Add</span>
            <span id="delete-domain-action" class="action disabled">Delete</span>
        </div>
    </div>
    <div class="domain heading">
        <div class="domain-line">
            <div class="domain-name">Domain</div>
            <div class="domain-status">Status</div>
            <div class="domain-checked">Last Checked</div>
        </div>
    </div>
    @foreach($domains as $domain)
        <div class="domain" data-id={{$domain->id}}>
            <div class="domain-line">
                @if ($domain->status === "UNAVAILABLE")
                    <div class="domain-info-toggle" title="Toggle for more info"><i class="fas fa-angle-right"></i></div>
                @endif
                <div class="domain-name">{{$domain->domain}}</div>
                <div class="domain-status">{{fixCase($domain->status)}}</div>
                @if ($domain->status !== "QUEUED")
                    <div class="domain-checked">{{$domain->last_checked}}</div>
                @endif
                <div class="domain-delete">
                    <i class="far fa-square"></i>
                </div>
            </div>
            @if ($domain->status === "UNAVAILABLE")
                <div class="domain-info">
                    <div>Expiry: {{$domain->expiry}}</div>
                    <div>Registration Date: {{$domain->registration_date}}</div>
                </div>
            @endif
        </div>
    @endforeach
@endsection


@section('scripts')
    <script type="text/javascript">
        var checked = {};

        $(".domain-info-toggle").on('click', function () {
            // Toggle the direction of the Icon
            var icon = $(this).find('i');
            icon.toggleClass('fa-angle-down');
            icon.toggleClass('fa-angle-right');

            $(this).parent().parent().find('.domain-info')
                .toggleClass('show');
        });

        $("#create-domain-action").on("click", function () {
            // Redirect to new page
            window.location.href = '/domains/create';
        });

        $("#delete-domain-action").on("click", function () {
            if ($(this).hasClass('disabled')) {
                // Check if button is disabled
                return;
            }

            // Create the list of domains to detach from the user
            var domains = [];
            for (let i in checked) {
                if (checked.hasOwnProperty(i)) {
                    if (checked[i]) {
                        domains.push(i);
                    }
                }
            }

            jQuery.post("/domains/delete", {
                domains: domains,
            })
                .then(function(response) {
                    location.reload();
                })
                .catch(function (error) {
                    console.error("There was an error trying to delete the domains", error);
                })
        });

        function handleDomainDeleteClick(id) {
            var enableDelete = false;
            if (checked[id]) {
                checked[id] = false;
            } else {
                checked[id] = true;
                enableDelete = true;
            }

            if (!enableDelete) {
                // Find if there is any domains currently checked
                for (var i in checked) {
                    if (checked.hasOwnProperty(i)) {
                        if (checked[i]) {
                            enableDelete = true;
                            break;
                        }
                    }
                }
            }

            if (enableDelete) {
                $("#delete-domain-action").removeClass('disabled');
            } else {
                $("#delete-domain-action").addClass('disabled');
            }
        }

        $(".domain-delete").on('click', function () {
            var icon = $(this).find('i');
            icon.toggleClass('fa-square');
            icon.toggleClass('fa-check-square');

            handleDomainDeleteClick($(this).parent().parent().data("id"));
        });
    </script>
@endsection