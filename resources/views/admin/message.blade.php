<div class="card card-outline card-primary">
    <div class="card-header">
        Message
    </div>
    <div class="card-body">
        <form action="{{Route('admin.send.message')}}" method="post">
            <label for="">TO :</label>
            <select name="name" class="form-control">
                @foreach ($user as $data)
                <option value="{{$data->name}}">{{$data->name}}</option>
                @endforeach
            </select>
            <label for="">Message :</label>
            <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
            <input type="submit" class="btn btn-primary float-right mt-2">
        </form>
    </div>
</div>