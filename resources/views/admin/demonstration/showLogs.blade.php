@extends('app-menu')

@section('content')
	<hr/>
	<li role="presentation" class={{$nav_title=="Install CICS"?"active":""}}>
		<a href="{{URL::route('admin.demonstration.create')}}?type=iCICS">Install CICS</a>
	</li>
	<li role="presentation" class={{$nav_title=="Install DB2"?"active":""}}>
		<a href="{{URL::route('admin.demonstration.create')}}?type=iDB2">Install DB2</a>
	</li>
	<li role="presentation" class={{$nav_title=="Uninstall CICS"?"active":""}}>
		<a href="{{URL::route('admin.demonstration.create')}}?type=uCICS">Uninstall CICS</a>
	</li>
	<li role="presentation" class={{$nav_title=="Uninstall DB2"?"active":""}}>
		<a href="{{URL::route('admin.demonstration.create')}}?type=uDB2">Uninstall DB2</a>
	</li>
@endsection