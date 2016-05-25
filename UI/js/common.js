String.prototype.replaceAll = function (reallyDo, replaceWith, ignoreCase) {
    if (!RegExp.prototype.isPrototypeOf(reallyDo)) {
        return this.replace(new RegExp(reallyDo, (ignoreCase ? "gi" : "g")), replaceWith);
    } else {
        return this.replace(reallyDo, replaceWith);
    }
}
function GetExDateString(str) {
    var reg = str.replaceAll("-", ",").replaceAll(":", ",").replaceAll(" ", ",").split(",");
    var nowTime = new Date();
    var oldTime = new Date(reg[0], reg[1]-1,reg[2],reg[3],reg[4],reg[5]);
    var interval = (nowTime.getTime() - oldTime.getTime()) / 1000;
    if (interval < 60) {
        return "刚刚";
    } else {
        interval = interval / 60;
        if (interval < 60) {
            return parseInt(interval).toString() + "分钟前";
        } else {
            interval = interval / 60;
            if (interval < 24) {
                return parseInt(interval).toString() + "小时前";
            } else {
                interval = interval / 7;
                if (interval < 7) {
                    return parseInt(interval).toString() + "天前";
                } else if (interval < 28) {
                    return parseInt(interval).toString() + "周前";
                } else if (interval < 366) {
                    return parseInt(interval).toString() + "月前";
                } else {
                    return parseInt(interval).toString() + "年前";
                }
            }
        }
    }
    return str;
}