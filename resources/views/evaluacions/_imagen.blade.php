<div class="card">
    <div class="card-content">
        <form action="{{route('comments.store')}}" class="reply-form" method="post">
            {{csrf_field()}}
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <div id="reply_notice" class="" style="color: gray;padding: 1rem;border: dashed 1px;font-size: 14px;">
                <ul class="helpblock list rm-link-color add-link-underline">
                    <li> Please pay attention to the spelling of the words and the typesetting in Chinese and English, <a href = "https://github.com/sparanoid/chinese-copywriting-guidelines">Reference this page </a> </ li>
                    <li> Support Markdown format, <strong> ** bold ** </ strong>, ~~ strikethrough ~~, <code> `single line code` </ code>, more syntax please see here <a href ="https://github.com/riku/Markdown-Syntax-CN/blob/master/syntax.md"> Markdown syntax </a> </ li>
                    {{-<li> Emoji support, please see <a href ="https://laravel-china.org/topics/45" target="_blank"> Emoji autocompletion </a>, available Emoji please see <img title =":metal:" alt=":metal:" class="emoji" src="https://lccdn.phphub.org/assets/images/emoji/metal.png" align="absmiddle"> <img title=":point_right:" alt=":point_right:" class="emoji" src="https://lccdn.phphub.org/assets/images/emoji/point_right.png" align="absmiddle"> <a href="https://laravel-china.org/ecc/index.html" target="_blank" rel="nofollow"> Emoji  List </a> <img title=":star:" alt=":star:" class="emoji" src="https://lccdn.phphub.org/assets/images/emoji/star.png" align="absmiddle"> <img title=":sparkles:" alt=":sparkles:" class="emoji" src="https://lccdn.phphub.org/assets/images/emoji/sparkles.png" align="absmiddle"> </li>--}} <li> Upload pictures, support drag and drop and clipboard paste upload, format restrictions- jpg, png, gif</li>
                    {{-<li> The post box supports local storage, which will be saved when the content changes, and it will be cleared when the "Submit" button is clicked </ li>-}}
                </ul>
            </div>
            <div class="message is-primary " style="margin: 1rem 0;">
                <div class="message-body" style="color:#10a3a3;">
                    <i class="fa fa-info"></i> &nbsp;&nbsp; Do not post unfriendly or negative content. Being kind to people is more important than being smart!
                </div>
            </div>
            <div class="field" >
                <p class="control">
                    <textarea id="content" class="textarea" placeholder= "Enter content, supportmarkdown" name="content"></textarea>
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <button class="button is-link" type="submit"><span class="icon"><i class="fa fa-send"></i></span><span> Submit </span></button>
                </p>
            </div>
        </form>
    </div>
</div>
