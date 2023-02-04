<h1>レシピ登録フォーム</h1>

<form id="myForm" action="/recipes/store" method='POST'>
    {{ csrf_field() }}

    <label>
        レシピ名
        <input type="text" placeholder="レシピ名を入れる" />
    </label>

    <br>

    <label>
        元ネタURL
        <input type="url" placeholder="元ネタあればURL貼る" />
    </label>

    <br>

    <label>
        写真
        <input type="file" />
    </label>

    <br>

    <label>
        どんな料理か
        <br>
        <textarea style="width: 300px; height: 100px"></textarea>
    </label>

    <br>
    <br>

    @for ($i = 0; $i < 15; $i++)
      <label for="food{{ $i }}">食材:</label>
      <select class="food" name="food[{{ $i }}][id]">
      <option value=""></option>
       @foreach($eiyos as $eiyo)
        <option value="{{ $eiyo->id }}">{{ $eiyo->food_name }}</option>
       @endforeach
      </select>

      <label for="volume{{ $i }}">分量（g）:</label>
      <input type="text" class="volume" name="food[{{ $i }}][volume]">
      <br>
    @endfor

    <br>

    <button>保存する</button>

</form>


<script>

    function addFields() {
  // Get the current number of fields
  var currentCount = document.getElementsByName("name").length;

  // Create new elements
  var fields = [
    {
      labelName: "食材",
      type: "text",
      name: "food",
      id: "food" + (currentCount + 1),
      placeholder: "",
    },
    {
      labelName: "分量（g）",
      type: "text",
      name: "volume",
      id: "volume" + (currentCount + 1),
      placeholder: "",
    }
  ];

  // Append new elements to the form
  var form = document.getElementById("myForm");
  fields.forEach(field => {
    var newLabel = document.createElement("label");
    newLabel.innerText = field.labelName
    var newField = document.createElement("input");
    newField.type = field.type;
    newField.name = field.name;
    newField.id = field.id;
    newField.placeholder = field.placeholder;
    form.appendChild(newLabel);
    form.appendChild(newField);
  });
  form.appendChild(document.createElement("br"));
}
</script>


{{--
@foreach($posts as $post)
    <p>{{ $post->id }} {{ $post->content }} {{ $post->created_at }}</p>
@endforeach
--}}
