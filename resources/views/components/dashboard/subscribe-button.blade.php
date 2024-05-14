@if ($user->id == $newsletter->user_id)
<x-buttons.subscribers :newsletter="$newsletter" :size="$size" />
@elseif ($user->subscriptions->where('id', $newsletter->id)->isNotEmpty())
<x-buttons.unsubscribe :newsletter="$newsletter" :size="$size" />
@else
<x-buttons.subscribe :newsletter="$newsletter" :size="$size" />
@endif