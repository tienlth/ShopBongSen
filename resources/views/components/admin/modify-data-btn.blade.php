<a @if(isset(\Request::query()['type-filter'])) 
        href={{route($routeName,[$id['idName']=>$id['value'], 'type-filter'=>\Request::query()['type-filter']])}}
    @elseif(isset(\Request::query()['style-filter'])) 
        href={{route($routeName,[$id['idName']=>$id['value'], 'style-filter'=>\Request::query()['style-filter']])}}
    @elseif(isset(\Request::query()['ingredient-filter'])) 
        href={{route($routeName,[$id['idName']=>$id['value'], 'ingredient-filter'=>\Request::query()['ingredient-filter']])}}
    @else 
        href={{route($routeName,[$id['idName']=>$id['value']])}}
    @endif>
    <button class="edit-btn"><i class="fa-solid fa-pen-to-square"></i><button>
</a>
