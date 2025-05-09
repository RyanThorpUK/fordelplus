@props(['id', 'wireModel'])

<div wire:ignore>
    <textarea
        x-data
        x-init="
            tinymce.init({
                selector: '#{{ $id }}',
                plugins: 'link lists',
                toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link',
                setup: function(editor) {
                    editor.on('change', function(e) {
                        @this.set('{{ $wireModel }}', editor.getContent())
                    });
                }
            })
        "
        id="{{ $id }}"
        {!! $attributes !!}
    >{{ $slot }}</textarea>
</div> 