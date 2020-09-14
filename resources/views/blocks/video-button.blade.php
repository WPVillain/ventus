{{--
  Title: Video Button
  Description: test
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
--}}

<div data-{{$block['id']}} class="{{$block['classes']}}">
  <a class="btn">{{the_field('button_text')}}</p>
  <cite>
</div>

<style type="text/css">
[data-{{$block['id']}}] {
  background: {{get_field('color')}};
}
</style>