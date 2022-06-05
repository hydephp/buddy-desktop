<div wire:init="load">
    <h5 wire:loading>Loading...</h5>
    <table wire:loading.attr="hidden">
        <thead>
            <tr>
                <th colspan="3" class="pt-3">Blog Posts</th>
            </tr>
        </thead>
        <tbody>
            @if(sizeof($posts) < 1)
            <tr>
                <td class="ps-3" colspan="3" >No Markdown files found in {{ $postsDir }}.</td>
            </tr>
            @else
            @foreach ($posts as $post)
            
            <tr>
                <td class="ps-3">
                    {{ basename($post) }}
                </td>
            </tr>
                
            @endforeach
            @endif
        </tbody>
        <thead>
            <tr>
                <th colspan="3" class="pt-3">Markdown Pages</th>
            </tr>
        </thead>
        <tbody>
            @if(sizeof($pages) < 1)
            <tr>
                <td class="ps-3" colspan="3" >No Markdown files found in {{ $pagesDir }}.</td>
            </tr>
            @else
            @foreach ($pages as $page)
            
            <tr>
                <td class="ps-3">
                    {{ basename($page) }}
                </td>
            </tr>
                
            @endforeach
            @endif
        </tbody>
        <thead>
            <tr>
                <th colspan="3" class="pt-3">Documentation Pages</th>
            </tr>
        </thead>
        <tbody>
            @if(sizeof($docs) < 1)
            <tr>
                <td class="ps-3" colspan="3" >No Markdown files found in {{ $docsDir }}.</td>
            </tr>
            @else
            @foreach ($docs as $doc)
            
            <tr>
                <td class="ps-3">
                    {{ basename($doc) }}
                </td>
            </tr>
                
            @endforeach
            @endif
        </tbody>
    </table>
</div>
