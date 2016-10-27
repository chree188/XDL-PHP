/**
 * @name:kimi,
 * @time:13-12-17,
 * @version:1.0
 */
;(function($){
    $.fn.extend({//添加class  最好是直接操作父级元素
        /*基类*/
        /*透明度*/
        clarity:function(){
            return this.each(function(){
                var $this = $(this);
                $this.hover(function(){
                    $this.stop().animate({
                        opacity:"1"
                    },200)
                },function(){
                    $this.stop().animate({
                        opacity:"0.5"
                    },200)
                })
            })
        },
        /*下拉菜单*/
        dropDown:function(){
            return this.each(function(){
                var $this = $(this);
                $this.hover(function(){
                    $this.addClass('active').find('.dropdown-menu').addClass('open');
                },function(){
                    $this.removeClass('active').find('.dropdown-menu').removeClass('open');
                })
            });
        },
        /*回到顶部*/
        goTop:function(){
            return this.each(function(){
                var $this=$(this);
                $(window).scroll(function(){
                    var scrollTop = $(window).scrollTop();
                    if(scrollTop > 0){
                        $this.css('display','block');
                    }else{
                        $this.fadeOut();
                    }
                });
                $this.click(function(){
                    $(window).scrollTop(0);
                })
            })
        },

        /*tab切换*/
        tabToggle:function(){
            return this.each(function(){
                var $this=$(this);
                $this.find('.tab-tit h3').click(function(){
                    $(this).addClass('tab-tit-cur').siblings().removeClass('tab-tit-cur');
                    $($this.find('.tab-c')[$(this).index()]).show().siblings().hide();
                });
            });
        },


        /*折叠，展开*/
        foldToggle:function(){
            return this.each(function(){
                var $this=$(this);
                var $fold_bd=$this.find('.fold-body');
                var $parent=$this.parent();
                $this.find('.fold').click(function(){
                    $fold_bd.slideUp();
                    $parent.removeClass('current');
                });
                $this.find('.unfold').click(function(){
                   $fold_bd.slideDown();
                   $parent.addClass('current');
                });

            });
        },

        /*消息框，点击X可关闭*/
        mesBox:function(){
            return this.each(function(){
                var $this=$(this);
                $this.find('.mes-close').click(function(){
                    $this.fadeOut(300);
                });
            });
        },


        // //提示框，点击flag红色小旗弹出，点击空白处关闭
        // tipBox:function(){
        //     // 加载tipBox所需样式
        //     // $("<link>").attr({ "rel": "stylesheet","href":"css/tipBox.css"}).appendTo("head");这种方式IE不能用
        //     var link = document.createElement('link');
        //     link.type = 'text/css';
        //     link.rel = 'stylesheet';
        //     link.href = 'css/tipbox.css';
        //     document.getElementsByTagName("head")[0].appendChild(link);
        //     // tips-box的html
        //     $("<div class='tips-box'><div class='tips-msg'></div><i class='arr-top-border tips-arr-border'></i><i class='arr-top tips-arr'></i></div>").appendTo("body");
        //     var $tips=$('.tips-box');
        //     var maxWidth=$('html').width();//页面宽度
        //     var _this=this;
        //     $(document).click(function(){
        //              //隐藏后恢复默认的方向（上）
        //              // $tips.find('.tips-arr-border').removeClass().addClass('tips-arr-border');
        //              // $tips.find('.tips-arr').removeClass().addClass('tips-arr');
        //             $tips.hide();
        //      });
        //     //阻止冒泡
        //     $tips.click(function(e){
        //         e.stopPropagation();
        //     });
          
        //     this.show=function(){
        //         $tips.show();
        //     };
        //     this.hide=function(){
        //         $tips.hide();
        //     }
        //     this.tip=function(e,txt){
        //         if(txt){
        //             $tips.find('.tips-msg').text(txt);
        //             var x=e.pageX;//鼠标点击坐标
        //             var y=e.pageY;
        //             var w=$tips.outerWidth();//tip-box高宽
        //             var h=$tips.outerHeight();
        //             var left,top;
        //             var dir=1;//上
        //             left=x-w/2;
        //             top=y-h;
        //             if(x+w/2>maxWidth){
        //                dir=4;//左
        //                left=x-w-18;
        //                top=y-h/2;
        //             }
        //             if(e.clientY-50<h){
        //                 dir=3;//下
        //                 top=y+30;
        //                 left=x-w/2;
        //                 if(x+w/2>maxWidth){
        //                     dir=4;//左
        //                     left=x-w-18;
        //                     top=y-h/2;
        //                 }
        //             }
        //             switch(dir){
        //                 case 1://上
        //                 $tips.find('.tips-arr-border').removeClass().addClass('arr-top-border tips-arr-border');
        //                 $tips.find('.tips-arr').removeClass().addClass('arr-top tips-arr');
        //                 break;
        //                 case 2://右

        //                 break;
        //                 case 3://下
        //                 $tips.find('.tips-arr-border').removeClass().addClass('arr-bottom-border tips-arr-border');
        //                 $tips.find('.tips-arr').removeClass().addClass('arr-bottom tips-arr');
        //                 break;
        //                 case 4://左
        //                 $tips.find('.tips-arr-border').removeClass().addClass('arr-left-border tips-arr-border');
        //                 $tips.find('.tips-arr').removeClass().addClass('arr-left tips-arr');
        //                 break;
        //             }
        //             $tips.css({'left':left+'px','top':top+'px'});
        //             _this.show();
        //         }
                
        //     };
        //     return this.each(function(){
        //         var $this=$(this);
        //         $this.find('.j-tip').mouseover(function(e){
        //             _this.tip(e,$(this).attr('data-tips'));
        //             e.stopPropagation();
        //         });
        //     });
        // },

        //验证金额类型
        moneyValidate:function(){
            return this.each(function(){
                var $this=$(this);

                $this.change(function(){
                    if( $(this).val().match(/^\.\d*$|^\d+(\.){0,1}\d*$/)==null ){
                        $(this).val("");
                    }
                }).keyup(function(){
                    if( $(this).val().match(/^\.\d*$|^\d+(\.){0,1}\d*$/)==null ){
                        $(this).val("");
                    }
                });
            });
        },

        selectAll:function($obj){
            var $checks=$obj;
            return this.each(function(){
                var $this=$(this);
                $this.click(function(){
                    if($this.prop('checked')==true){
                        $checks.each(function(){
                            $(this).prop('checked',true);
                        });
                    }else if($this.prop('checked')==false){
                        $checks.each(function(){
                            $(this).prop('checked',false);
                        });
                    }
                });
            });
        }


    })
})(jQuery);

