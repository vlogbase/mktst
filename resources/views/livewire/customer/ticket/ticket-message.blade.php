<div class="bg-light p-5">
    <ul id="messageList" class="list-unstyled">
        @foreach ($ticket_messages as $item)
            @if ($author === 'customer')
                @if ($item->author === 'customer')
                    <li class="d-flex my-5 justify-content-end">
                        <span class="text-primary w-50 text-end "><strong>{{ $item->humanTime() }} - You:
                            </strong><br>{{ $item->message }}
                            @if ($item->file)
                            <br>
                                <a href="{{ asset('/' . $item->file) }}" target="_blank"
                                    class="btn btn-primary btn-xs">Open File</a>
                            @endif
                        </span>

                    </li>
                @endif
                @if ($item->author === 'admin')
                    <li class="d-flex my-5 justify-content-start">
                        <span class="text-gray w-50 "><strong>{{ $item->humanTime() }} - Support : </strong><br>
                            {{ $item->message }}
                            @if ($item->file)
                            <br><br>
                                <a href="{{ asset('/' . $item->file) }}" target="_blank"
                                    class="btn btn-primary btn-xs">Open File</a>
                            @endif
                        </span>

                    </li>
                @endif
            @else
                @if ($item->author === 'admin')
                    <li class="d-flex my-5 justify-content-end">
                        <span class="text-primary w-50 text-end "><strong>{{ $item->humanTime() }} - You :
                            </strong><br>{{ $item->message }}
                            @if ($item->file)
                            <br><br>
                                <a href="{{ asset('/' . $item->file) }}" target="_blank"
                                    class="btn btn-primary btn-xs">Open File</a>
                            @endif
                        </span>

                    </li>
                @endif
                @if ($item->author === 'customer')
                    <li class="d-flex my-5 justify-content-start">
                        <span class="text-gray w-50 "><strong>{{ $item->humanTime() }} - Customer: </strong><br>
                            {{ $item->message }}
                            @if ($item->file)
                                <br><br>
                                <a href="{{ asset('/' . $item->file) }}" target="_blank"
                                    class="btn btn-primary btn-xs">Open File</a>
                            @endif
                        </span>

                    </li>
                @endif
            @endif
        @endforeach
    </ul>
    @if ($ticket->status === 'Created')
        <form wire:submit.prevent="submit">
            <div class="input-group justify-end">
                @if ($file)
                    <div class="mt-2">
                        Uploaded File: {{ $file->getClientOriginalName() }}
                    </div>
                @endif
            </div>
            <div class="input-group ">
                <input type="text" placeholder="Message..."
                    class="form-control form-control-lg form-control-solid @error('text_message') is-invalid @enderror"
                    wire:model="text_message">
                <button onclick="document.getElementById('fileInput').click();" type="button"
                    class="btn btn-secondary">
                    <i class="fa fa-paperclip"></i>
                </button>
                <input id="fileInput" type="file" wire:model="file" style="display:none;"
                    class="form-control form-control-lg form-control-solid @error('file') is-invalid @enderror">


                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    @endif

    @if ($author === 'admin')
        <div class="mt-5 py-5">
            @if ($ticket->status === 'Created')
                <button wire:click="changeTicketStatus('Closed')" type="button" class="btn btn-success btn-block">Close
                    the ticket</button>
            @else
                <button wire:click="changeTicketStatus('Created')" type="button"
                    class="btn btn-danger btn-block">Re-open the ticket</button>
            @endif
        </div>
    @endif

</div>
