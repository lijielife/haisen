<?php
class CatalogModel extends Model
{
    // 获取分类下的商品数量[商品分类页面]
    public function __get_goods_count_category( $data = array() )
    {
        $w = $this->__category_goods_where( $data );
        $sql = "SELECT COUNT(distinct g.goods_id) FROM `{$this->prefix()}goods` AS g";
        $sql .=" LEFT JOIN `{$this->prefix()}brand` AS b ON g.brand_id = b.brand_id";
        $sql .=" LEFT JOIN `{$this->prefix()}goods_cate` AS gc ON gc.cat_id = g.cat_id";
        $sql .=" LEFT JOIN `{$this->prefix()}category_sub_goods` AS csg ON g.goods_id=csg.goods_id";
        $sql .=" $w";
        return $this->findvar( $sql );
    }
        
    //获取分类下的商品[商品分类页面]
    public function __get_categoods_list_category( $data, $orderby, $start, $list )
    {
        $w = $this->__category_goods_where( $data );
        $sql = "SELECT distinct g.*,b.brand_name,b.brand_id,gc.cat_name FROM `{$this->prefix()}goods` AS g";
        $sql .=" LEFT JOIN `{$this->prefix()}brand` AS b ON g.brand_id = b.brand_id";
        $sql .=" LEFT JOIN `{$this->prefix()}goods_cate` AS gc ON gc.cat_id = g.cat_id";
        $sql .=" LEFT JOIN `{$this->prefix()}category_sub_goods` AS csg ON g.goods_id=csg.goods_id";
        $sql .=" $w $orderby LIMIT $start, $list";
        $rt = $this->find( $sql );
        $goodslist = array();
        if ( ! empty( $rt ) )
        {
            foreach ( $rt as $k => $row )
            {
                $goodslist[$k] = $row;
                $goodslist[$k]['goods_thumb'] = is_file(SYS_PATH.$row['goods_thumb']) ? SITE_URL.$row['goods_thumb'] : SITE_URL.'theme/images/no_picture.gif';
                $goodslist[$k]['goods_img'] = is_file(SYS_PATH.$row['goods_img']) ? SITE_URL.$row['goods_img'] : SITE_URL.'theme/images/no_picture.gif';
                $goodslist[$k]['original_img'] = is_file(SYS_PATH.$row['original_img']) ? SITE_URL.$row['original_img'] : SITE_URL.'theme/images/no_picture.gif';
            }
            unset( $rt );
        }
        return $goodslist;
    }
        
    // 条件
    public function __category_goods_where( $data = array() )
    {
        if ( empty( $data ) ) return "";
        $cid     = isset( $data['cid'] ) && intval( $data['cid'] ) > 0 ? intval( $data['cid'] ) : 0;
        $bid     = isset( $data['bid'] ) && intval( $data['bid'] ) > 0 ? intval( $data['bid'] ) : 0;
        $price   = isset( $data['price'] ) ? $data['price'] : "";
        $keyword = isset( $data['keyword'] ) ? $data['keyword'] : "";
        $store_id = isset( $data['store_id'] ) ? $data['store_id'] : '';

        $comd   = array();
        $subsql = "";
        // 子分类
        if ( $cid > 0 )
        {
            $sub_cid = $this->get_goods_sub_cat_ids_model( $cid ); // 子分类id
            $comd[] = "(g.cat_id" . db_create_in( $sub_cid ) . " OR csg.cat_id='$cid')";
        }
        if ( isset( $store_id ) )
        {
            $comd[] = "g.store_id = '$store_id'";
        }
        
        $comd[] = "g.is_on_sale = '1' AND g.is_check='1' AND g.is_delete = '0' AND g.is_alone_sale='1' AND g.is_jifen='0'";
        
        ($bid>0) ? $comd[] = "b.brand_id='$bid'" : ""; //品牌
        
        /* 价格 */
        if ( ! empty( $price ) )
        {
            $p_ar = @explode( '-', $price );
            if ( count( $p_ar ) == 2 )
            {
                if ( empty( $p_ar[1] ) )  
                {
                    $p_ar[1] = 10000;
                }
                sort( $p_ar );
                $price1 = intval( trim( $p_ar[0] ) );
                $price2 = intval( trim( $p_ar[1] ) );
                if ( $price1 >= 0 && $price2 > 0 )
                {
                    $comd[] = "(g.shop_price between $price1 and $price2)";
                }
            }
        }
        
        if ( ! empty( $keyword ) )
        {
            $act = array( 'is_best', 'is_new', 'is_hot', 'is_promote', 'is_qianggou' );
            if ( in_array( $keyword, $act ) )
            {
                switch ( $keyword )
                {
                    case 'is_best':
                        $comd[] = "g.is_best='1'";
                        break;
                    case 'is_new':
                        $comd[] = "g.is_new='1'";
                        break;
                    case 'is_hot':
                        $comd[] = "g.is_hot='1'";
                        break;
                    case 'is_promote':
                        $time = time();
                        $comd[] = "AND g.is_promote = '1' AND g.promote_start_date <= '$time' AND g.promote_end_date >= '$time'";
                    case 'is_qianggou':
                        $time = time();
                        $comd[] = "AND g.is_qianggou = '1' AND g.qianggou_start_date <= '$time' AND g.qianggou_end_date >= '$time'";
                        break;
                }
            }
            else
            {
                $comd[] = "(gc.cat_name LIKE '%$keyword%' OR g.goods_name LIKE '%$keyword%' OR g.goods_bianhao LIKE '%$keyword%')";
            }
        }
        $w = "";
        if ( ! empty( $comd ) )
        {
            $w = "WHERE " . implode( ' AND ', $comd );
        }
        return  $w;
    }
        
    ################由于调用不了controller.php的方法，所以在这里重写定义了##################    
    //获商品子自分类cat_id
    public function get_goods_sub_cat_ids_model( $cid = 0 )
    {
        $rts = $this->get_goods_cate_tree_model($cid);
        $cids[] = $cid;
        if ( ! empty( $rts ) )
        {
            foreach ( $rts as $row )
            {
                $cids[] = $row['id'];
                if ( ! empty( $row['cat_id'] ) )
                {
                    foreach ( $row['cat_id'] as $rows )
                    {
                        $cids[] = $rows['id'];
                        if ( ! empty( $rows['cat_id'] ) )
                        {
                            foreach ( $rows['cat_id'] as $rowss )
                            {
                                $cids[] = $rowss['id'];
                            } // end foreach
                        } // end if
                    } // end foreach
                } // end if
            } // end foreach
        }// end if
        return $cids;
    }
    
    //获取商品分类
    public function get_goods_cate_tree_model( $cid = 0 )
    {
        $three_arr = array();
        $sql = 'SELECT count(cat_id) FROM `'.$this->prefix()."goods_cate` WHERE parent_id = '$cid' AND is_show = 1";
        if ( $this->findvar( $sql ) || $cid == 0 )
        {
            $sql = 'SELECT tb1.cat_name,tb1.cat_id,tb1.parent_id,tb1.is_show,tb1.cat_title,tb1.cat_desc, tb1.keywords,tb1.show_in_nav,tb1.sort_order, COUNT(tb2.cat_id) AS goods_count FROM `'.$this->prefix()."goods_cate` AS tb1";
            $sql .=" LEFT JOIN `{$this->prefix()}goods` AS tb2";
            $sql .=" ON tb1.cat_id = tb2.cat_id";
            $sql .= " WHERE tb1.parent_id = '$cid' GROUP BY tb1.cat_id ORDER BY tb1.parent_id ASC,tb1.sort_order ASC, tb1.cat_id ASC";
            $res = $this->find( $sql ); 
            foreach ( $res as $row )
            {
                $three_arr[$row['cat_id']]['id']          = $row['cat_id'];
                $three_arr[$row['cat_id']]['name']        = $row['cat_name'];
                $three_arr[$row['cat_id']]['is_show']     = $row['is_show'];
                $three_arr[$row['cat_id']]['show_in_nav'] = $row['show_in_nav'];
                $three_arr[$row['cat_id']]['cat_title']   = $row['cat_title'];
                $three_arr[$row['cat_id']]['sort_order']  = $row['sort_order'];
                $three_arr[$row['cat_id']]['goods_count'] = $row['goods_count'];
                $three_arr[$row['cat_id']]['keywords']    = $row['keywords'];
                $three_arr[$row['cat_id']]['cat_desc']    = $row['cat_desc'];
                $three_arr[$row['cat_id']]['url']         = ADMIN_URL . "catalog.php?cid=" . $row["cat_id"];
               
                if ( isset( $row['cat_id'] ) != NULL )
                {
                    $three_arr[$row['cat_id']]['cat_id'] = $this->get_goods_cate_tree_model($row['cat_id']);
                }
            }
        }
        return $three_arr;
    }
}