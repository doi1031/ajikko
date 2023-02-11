<style>
    form {
        width: 60%;
        margin: auto;
        padding: 30px;
        background-color: #f2f2f2;
        border-radius: 10px;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    label {
        font-weight: bold;
        margin-right: 10px;
    }

    input[type="text"], input[type="url"], textarea, select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    input[type="file"] {
        padding: 12px 20px;
        margin: 8px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button {
        width: 100%;
        padding: 14px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #3e8e41;
    }
</style>

<h1>レシピ登録フォーム</h1>

<form id="myForm" action="/recipes/store" method='POST' enctype="multipart/form-data">
    {{ csrf_field() }}

    <label>
        レシピ名
        <input name="recipe_title" type="text" placeholder="レシピ名を入れる" />
    </label>

    <br>

    <label>
        元ネタURL
        <input name="motoneta_url" type="url" placeholder="元ネタあればURL貼る" />
    </label>

    <br>

    <label>
        写真
        <input name="photo" type="file" />
    </label>

    <br>

    <label>
        どんな料理か
        <br>
        <textarea name="description_text" style="width: 300px; height: 100px"></textarea>
    </label>

    <br>

    <label>
        何食分（何人分）か
        <br>
        <select name="how_many">
          <option value="1">1</option>
          <option value="1.5">1.5</option>
          <option value="2">2</option>
          <option value="2.5">2.5</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="8">8</option>
          <option value="10">10</option>
        </select>
    </label>

    <br>
    <br>

    @for ($i = 0; $i < 15; $i++)
      <div style="display: flex; align-items: center;">
        <label for="food{{ $i }}">食材:</label>
        <select class="food" name="food[{{ $i }}][id]">
        <option value=""></option>
         @foreach($eiyos as $eiyo)
          <option value="{{ $eiyo->id }}">{{ $eiyo->food_name }}</option>
         @endforeach
        </select>

        <label for="volume{{ $i }}">分量（g）:</label>
        <input type="text" class="volume" name="food[{{ $i }}][volume]">
      </div>
      <br>
    @endfor

    <br>

    <button>保存する</button>

</form>


   
