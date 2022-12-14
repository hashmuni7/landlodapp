<div>
    <x-slot name="title">
        Landlord
    </x-slot>
    

    <x-slot name="header">
        <header class="page-header">
            <h2>Landlord</h2>
        
            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{-- url('/adminhome') --}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Landlords</span></li>                    
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
                                        {{$landlord->firstname}} {{$landlord->lastname}}
                                    </strong>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Gender</span>
                                    <span class="body-tag">{{$landlord->sex ? 'Male' : 'Female'}}</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Properties</span>
                                    <span class="body-tag">{{$landlord->properties()->count()}}</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Spaces</span>
                                    <span class="body-tag">{{$landlord->spaces()->count()}}</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Tenants</span>
                                    <span class="body-tag">{{$landlord->spaces()->count()}}</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Occupancy</span>
                                    <span class="body-tag">{{$landlord->spaces()->count() ? ($landlord->spaces()->count()/$landlord->spaces()->count()) * 100 . '%' : '0%'}}</span>
                                </div>
                                <div class="col-xl-3 stag mb-3">
                                    <span class="head-tag">Phone Number</span>
                                    <span class="body-tag">{{$landlord->phone}}</span>
                                </div>
                                <div class="col-xl-6 stag mb-3">
                                    <span class="head-tag">Email</span>
                                    <span class="body-tag" style="font-size: 1.1em">{{$landlord->email}}</span>
                                </div>                                     
                                
                            </div>
                        </div>
                        <div class="col-xl-4 text-center">
                            <i class="mt-4 fas fa-home" style="font-size: 9em;" aria-hidden="true"></i>
                            <h4 class="center">                                    
                                <strong>
                                    Outstanding Balance: {{$this->ugx($outstandingBalance->bal)}}
                                </strong>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-xl-7 m-auto">
                            <div class="btn-group d-flex" role="group">
                                <a class="btn btn-default w-100" role="button" href="{{url("/landlords/landlord/editlandlord/$landlord->id")}}">Edit</a>
                                <a class="btn btn-default w-100" role="button" href="{{url("/landlords/landlord/addproperty/$landlord->id")}}">Add Property</a>
                                <a class="btn btn-default w-100" role="button" href="{{url("/landlords/landlord/addspace/$landlord->id")}}">Add Space</a>
                                <!--<a class="btn btn-default w-100" role="button" href="{{url("/landlords/landlord/addtenant/$landlord->id")}}">Add Tenant</a>-->                                                                   
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
                    <li class="nav-item {{ $activeTab === 'properties' ? 'active' : ''}}" wire:click.prevent="activateTab('properties')">
                        <a class="nav-link" href="#properties" data-toggle="tab">Properties</a>
                    </li>
                    <li class="nav-item {{ $activeTab === 'spaces' ? 'active' : ''}}" wire:click.prevent="activateTab('spaces')">
                        <a class="nav-link" href="#spaces" data-toggle="tab">Spaces</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="payments" class="tab-pane {{ $activeTab === 'payments' ? 'active' : ''}}">                            
                        <div class="row">
                            <div class="col-md-12">
                                <section class="card">
                                    @livewire('tables.landlord-properties-payments', ['landlord' => $landlord, 'fetchFor' => 1])
                                </section>
                            </div>
                        </div>
                        
                    </div>
                    <div id="properties" class="tab-pane {{ $activeTab === 'properties' ? 'active' : ''}}">
                        <div class="container-fluid">
                            <section class="card">
                                @livewire('tables.landlord-properties', ['landlord' => $landlord, 'fetchFor' => 1])
                            </section>
                        </div>
                    </div>
                    <div id="spaces" class="tab-pane {{ $activeTab === 'spaces' ? 'active' : ''}}">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="card">
                                    @livewire('tables.landlord-spaces', ['landlord' => $landlord, 'fetchFor' => 1])
                                    
                                </section>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </div>

    
    
</div>
