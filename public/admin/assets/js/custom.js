$('.removeImage').on('click', function(){
    var self = $(this);
    $.get('/en/dashboard/exhibitions/image/' + self.data('exhibition_id') + '/' + self.data('index_id'), function(data){
        if(data == '1'){
            self.remove();
        }
    })
});
$('.removeBoothImage').on('click', function(){
    var self = $(this);
    $.get('/en/dashboard/exhibitions_booths/image/' + self.data('exhibition_booth_id') + '/' + self.data('index_id'), function(data){
        if(data == '1'){
            self.remove();
        }
    })
});
$('.onchange_giftsappend').on('change', function(){
    var self = $(this);
    $.get('/en/dashboard/gift_list/' + self.val(), function(data){
        let user_list = '';
        let gift_list = '';
        data[0].forEach(element => {
            user_list += '<option value="'+element.id+'">'+element.name+'</option>';
        });
        $('select[name="user_id"]').html(user_list);
        data[1].forEach(element => {
            gift_list += '<option value="'+element.id+'">'+element.name+'</option>';
        });
        $('select[name="gift_id"]').html(gift_list);
    })
});
$('.change_setting_key').on('change', function(){
    var self = $(this);
    var type = self.val();
    $('.setting_value').each(function(index, value){
        if(type == 'text'){
            var name = $(value).find('input').attr('name');
            if(name == ''){
                name = $(value).find('textarea').attr('name');
            }
            $(value).find('input').show().attr('name', name).attr('type', 'text');
            $(value).find('textarea').hide().attr('name', '');
        }
        if(type == 'image'){
            var name = $(value).find('input').attr('name');
            if(name == ''){
                name = $(value).find('textarea').attr('name');
            }
            $(value).find('input').show().attr('name', name).attr('type', 'file');
            $(value).find('textarea').hide().attr('name', '');
        }
        if(type == 'editor'){
            let name = $(value).find('input').attr('name');
            $(value).find('input').hide().attr('name', '');
            $(value).find('textarea').show().attr('name', name);
        }
    });
});
$('.gift_checker').on('change', function(){
    var self = $(this);
    var event_id = self.data('event');
    var gift_id = self.data('gift');
    var user_id = self.data('user');
    var type = 'not-checked';
    if(self.is(':checked') === true){
        type = 'checked';
    }
    var url = self.parents('table').data('url') + '?event_id='+event_id+'&gift_id='+gift_id+'&user_id='+user_id+'&type='+type;
    $.get(url, function(data){
        if(type == 'checked'){
            if(data != '1'){
                self.prop('checked', false);
            }
        }else{
            if(data != '1'){
                self.prop('checked', true);
            }
        }
    })
    .fail(function() {
        if(type == 'checked'){
            self.prop('checked', false);
        }else{
            self.prop('checked', true);
        }
    });
});
