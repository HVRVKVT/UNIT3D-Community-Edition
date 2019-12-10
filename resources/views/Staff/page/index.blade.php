@extends('layout.default')

@section('breadcrumb')
    <li>
        <a href="{{ route('staff.dashboard.index') }}" itemprop="url" class="l-breadcrumb-item-link">
            <span itemprop="title" class="l-breadcrumb-item-link-title">@lang('staff.staff-dashboard')</span>
        </a>
    </li>
    <li class="active">
        <a href="{{ route('staff.pages.index') }}" itemprop="url" class="l-breadcrumb-item-link">
            <span itemprop="title" class="l-breadcrumb-item-link-title">Pages</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="container box">
        <h2>Pages</h2>
        <a href="{{ route('staff.pages.create') }}" class="btn btn-primary">Add a new page</a>
    
        <div class="table-responsive">
            <table class="table table-condensed table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>@lang('common.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($folios as $folio)
                        <tr>
                            <td>
                                <a href="{{ route('pages.show', ['id' => $folio->id]) }}">
                                    {{ $folio->name }}
                                </a>
                            </td>
                            <td>
                                {{ $folio->created_at }} ({{ $folio->created_at->diffForHumans() }})
                            </td>
                            <td>
                                <form action="{{ route('staff.pages.destroy', ['id' => $folio->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('staff.pages.edit', ['id' => $folio->id]) }}"
                                        class="btn btn-warning">@lang('common.edit')</a>
                                    <button type="submit" class="btn btn-danger">@lang('common.delete')</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
