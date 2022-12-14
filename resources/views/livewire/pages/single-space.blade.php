<div >
    <x-slot name="title">
        {{$space->spacename}}
    </x-slot>
    

    <x-slot name="header">
        <header class="page-header">
            <h2>{{$space->spacename}}</h2>
        
            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{-- url('/adminhome') --}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Space</span></li>                    
                </ol>
        
                <a class="sidebar-right-toggle" ><i class="fas fa-chevron-left"></i></a>
            </div>
        </header>
    </x-slot>

    <div class="row">
        <div class="container-fluid mb-3">
            <section class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="col-xl-12">
                                <h2 class="center">                                    
                                    <strong>
                                        {{$space->spacename}}
                                    </strong>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Space Code</span>
                                    <span class="body-tag">{{$space->spaceid}}</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Property</span>
                                    <span class="body-tag">{{$space->property}}</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Status</span>
                                    <span class="body-tag">{{$space->occupied ? 'Occupied' : 'Vacant'}}</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Rent</span>
                                    <span class="body-tag">{{$this->ugx($space->rentprice)}}</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Rental Period</span>
                                    <span class="body-tag">{{$space->rentalperiod}} Days</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">First Payment</span>
                                    <span class="body-tag">{{$space->initialpaymentfor}} months</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Charge Late Fee</span>
                                    <span class="body-tag">{{$space->latecharge ? 'Yes' : 'No'}}</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Late Fee</span>
                                    <span class="body-tag">{{ $this->ugx($space->latefee) }}</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Grace Period in days</span>
                                    <span class="body-tag">{{$space->graceperiod}} days</span>
                                </div>
                               
                                                                     
                                
                            </div>
                            <!--
                            <hr />
                            <p class="h5">Tenant</p>
                            @if ($space->occupied)
                            <div class="row">
                                <div class="col-xl-6 stag mb-3">
                                    <span class="head-tag">Name</span>
                                    <span class="body-tag">{{$tenant->firstname}} {{$tenant->lastname}} {{$tenant->othernames}}</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Gender</span>
                                    <span class="body-tag">{{$tenant->sex ? 'Male' : 'Female'}}</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Phone Number</span>
                                    <span class="body-tag">{{$tenant->phone}}</span>
                                </div>
                                <div class="col-xl-6 stag mb-3">
                                    <span class="head-tag">Email</span>
                                    <span class="body-tag">{{$tenant->email}}</span>
                                </div>
                            </div>
                            @endif
                            @if (!$space->occupied)
                            <div class="row">
                                <div class="col-xl-6 stag mb-3">
                                    
                                    <span class="body-tag">Vacant</span>
                                </div>
                            </div>
                            @endif
                            -->
                            
                            
                        </div>
                        <div class="col-xl-4 text-center">
                            <i class="mt-4 fas fa-home" style="font-size: 9em;" aria-hidden="true"></i>
                            <h4 class="center">                                    
                                <strong>
                                    Outstanding Balance: {{$this->ugx($space->balance)}}
                                </strong>
                            </h4>
                            <!--<button type="button" class="btn btn-primary btn-md btn-block">Pay Rent</button>-->
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-xl-7 m-auto">
                            <div class="btn-group d-flex" role="group">
                                <a class="btn btn-default w-100" wire:click.prevent="chargeRent" role="button" >Charge Rent</a>
                                <a class="btn btn-default w-100 modal-with-zoom-anim" href="#exampleModal" role="button" >Charge Fee</a>
                                
                                @if ($space->balance < 1)
                                <a class="btn btn-default w-100 modal-with-zoom-anim" href="#settleModal" role="button">Settle</a>
                                @endif
                                @if ($space->balance > 1)
                                    <a class="btn btn-default w-100 modal-with-zoom-anim" href="#refundModal" role="button">Refund</a>
                                @endif
                                
                                
                                <!--<a class="btn btn-default w-100" href="{{ url("/spaces/space/changetenant/$space->spaceid") }}" role="button">Change Tenant</a>-->
                                <!--<a class="btn btn-default w-100" role="button">Send Reminder</a>-->                                                                 
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="nav-item {{ $activeTab === 'payments' ? 'active' : ''}}" wire:click.prevent="activateTab('payments')">
                        <a class="nav-link" href="#payments" data-toggle="tab"><i class="fas fa-star"></i> Payments</a>
                    </li>
                    <li class="nav-item {{ $activeTab === 'ledgers' ? 'active' : ''}}" wire:click.prevent="activateTab('ledgers')">
                        <a class="nav-link" href="#ledgers" data-toggle="tab">Ledgers</a>
                    </li>
                    <li class="nav-item {{ $activeTab === 'spaceHistory' ? 'active' : ''}}" wire:click.prevent="activateTab('spaceHistory')">
                        <a class="nav-link" href="#spaceHistory" data-toggle="tab">Space History</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="payments" class="tab-pane {{ $activeTab === 'payments' ? 'active' : ''}}">                            
                        <div class="row">
                            <div class="col-md-12">
                                <section class="card">
                                    @livewire('tables.payments-to-space', ['space' => $space])
                                </section>
                            </div>
                        </div>
                        
                    </div>
                    <div id="ledgers" class="tab-pane {{ $activeTab === 'ledgers' ? 'active' : ''}}">
                        <div class="container-fluid">
                            <section class="card">
                                @livewire('tables.space-ledger', ['space' => $space])
                            </section>
                        </div>
                    </div>
                    <div id="spaceHistory" class="tab-pane {{ $activeTab === 'spaceHistory' ? 'active' : ''}}">
                        <div class="container-fluid">
                            <section class="card">
                                @livewire('tables.space-history', ['space' => $space])
                            </section>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </div>

   

    <div id="exampleModal" class="zoom-anim-dialog modal-block modal-block-sm mfp-hide">
        <section class="card">
            <form wire:submit.prevent="chargeTenant">
                {{ csrf_field() }}
                    <header class="card-header">
                        <h2 class="card-title" id="heading">Charge Tenant in S-P1-1</h2>
                    </header>
                    <div class="card-body">
                        <div>
                            <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="Amount">Amount</label>
                                        <input type="name" class="form-control p-p" id="amount" name="amount" placeholder="50000" wire:model="chargeTenantAmount" required>
                                    </div>
                            </div> 
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Description</label>
                                    <div>
                                        <textarea class="form-control" rows="3" data-plugin-maxlength maxlength="140" wire:model="chargeTenantDescription"></textarea>
                                    </div>
                                </div>
                            </div> 
                            
                    </div>
                            
                        
                    </div>
                    <footer class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Charge</button>
                                <button type="button" class="btn btn-default modal-dismiss">Cancel</button>
                            </div>
                        </div>
                    </footer>
            </form>  
        </section>
    </div>

    <div id="settleModal" class="zoom-anim-dialog modal-block modal-block-sm mfp-hide">
        <section class="card">
            <form wire:submit.prevent="settleTenant">
                {{ csrf_field() }}
                    <header class="card-header">
                        <h2 class="card-title" id="heading">Settle Tenant in S-P1-1</h2>
                    </header>
                    <div class="card-body">
                        <div>
                            <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="Amount">Amount</label>
                                        <input type="name" class="form-control p-p" id="settleAmount" name="settleAmount" placeholder="50000" wire:model="settleTenantAmount" required>
                                    </div>
                            </div> 
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Description</label>
                                    <div>
                                        <textarea class="form-control" rows="3" data-plugin-maxlength maxlength="140" wire:model="settleTenantDescription"></textarea>
                                    </div>
                                </div>
                            </div> 
                            
                    </div>
                            
                        
                    </div>
                    <footer class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Settle</button>
                                <button type="button" class="btn btn-default modal-dismiss">Cancel</button>
                            </div>
                        </div>
                    </footer>
            </form>  
        </section>
    </div>

    <div id="refundModal" class="zoom-anim-dialog modal-block modal-block-sm mfp-hide">
        <section class="card">
            <form wire:submit.prevent="refundTenant">
                {{ csrf_field() }}
                    <header class="card-header">
                        <h2 class="card-title" id="heading">Refund Tenant in S-P1-1</h2>
                    </header>
                    <div class="card-body">
                        <div>
                            <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="Amount">Amount</label>
                                        <input type="name" class="form-control p-p" id="refundAmount" name="refundAmount" placeholder="50000" wire:model="refundTenantAmount" required>
                                    </div>
                            </div> 
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Description</label>
                                    <div>
                                        <textarea class="form-control" rows="3" data-plugin-maxlength maxlength="140" wire:model="refundTenantDescription"></textarea>
                                    </div>
                                </div>
                            </div> 
                            
                    </div>
                            
                        
                    </div>
                    <footer class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Refund</button>
                                <button type="button" class="btn btn-default modal-dismiss">Cancel</button>
                            </div>
                        </div>
                    </footer>
            </form>  
        </section>
    </div>








    <!-- My Scripts-->
    <script>
        window.addEventListener('charged-tenant-success', event => {
            $.magnificPopup.close();
        })
    </script>
</div>
