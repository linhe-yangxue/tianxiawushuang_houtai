
if ($.fn.pagination){
	$.fn.pagination.defaults.beforePageText = '��';
	$.fn.pagination.defaults.afterPageText = '��{pages}ҳ';
	$.fn.pagination.defaults.displayMsg = '��ʾ{from}��{to},��{total}��¼';
}
if ($.fn.datagrid){
	$.fn.datagrid.defaults.loadMsg = '���ڴ��������Դ�������';
}
if ($.fn.treegrid && $.fn.datagrid){
	$.fn.treegrid.defaults.loadMsg = $.fn.datagrid.defaults.loadMsg;
}
if ($.messager){
	$.messager.defaults.ok = 'ȷ��';
	$.messager.defaults.cancel = 'ȡ��';
}
if ($.fn.validatebox){
	$.fn.validatebox.defaults.missingMessage = '��������Ϊ������';
	$.fn.validatebox.defaults.rules.email.message = '��������Ч�ĵ����ʼ���ַ';
	$.fn.validatebox.defaults.rules.url.message = '��������Ч��URL��ַ';
	$.fn.validatebox.defaults.rules.length.message = '�������ݳ��ȱ������{0}��{1}֮��';
	$.fn.validatebox.defaults.rules.remote.message = '���������ֶ�';
}
if ($.fn.numberbox){
	$.fn.numberbox.defaults.missingMessage = '��������Ϊ������';
}
if ($.fn.combobox){
	$.fn.combobox.defaults.missingMessage = '��������Ϊ������';
}
if ($.fn.combotree){
	$.fn.combotree.defaults.missingMessage = '��������Ϊ������';
}
if ($.fn.combogrid){
	$.fn.combogrid.defaults.missingMessage = '��������Ϊ������';
}
if ($.fn.calendar){
	$.fn.calendar.defaults.weeks = ['��','һ','��','��','��','��','��'];
	$.fn.calendar.defaults.months = ['һ��','����','����','����','����','����','����','����','����','ʮ��','ʮһ��','ʮ����'];
}
if ($.fn.datebox){
	$.fn.datebox.defaults.currentText = '����';
	$.fn.datebox.defaults.closeText = '�ر�';
	$.fn.datebox.defaults.okText = 'ȷ��';
	$.fn.datebox.defaults.missingMessage = '��������Ϊ������';
	$.fn.datebox.defaults.formatter = function(date){
		var y = date.getFullYear();
		var m = date.getMonth()+1;
		var d = date.getDate();
		return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
	};
	$.fn.datebox.defaults.parser = function(s){
		if (!s) return new Date();
		var ss = s.split('-');
		var y = parseInt(ss[0],10);
		var m = parseInt(ss[1],10);
		var d = parseInt(ss[2],10);
		if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
			return new Date(y,m-1,d);
		} else {
			return new Date();
		}
	};
}
if ($.fn.datetimebox && $.fn.datebox){
	$.extend($.fn.datetimebox.defaults,{
		currentText: $.fn.datebox.defaults.currentText,
		closeText: $.fn.datebox.defaults.closeText,
		okText: $.fn.datebox.defaults.okText,
		missingMessage: $.fn.datebox.defaults.missingMessage
	});
}