<template>
  <div class="calendar">
    <el-calendar first-day-of-week="7">
      <template slot="dateCell" slot-scope="{ date, data }">
        <p :class="{ dots: holiday.hasOwnProperty(data.day) }">
          <span>{{ data.day.split("-").slice(1).join("-") }}</span
          ><br />
          <span v-if="holiday.hasOwnProperty(data.day)">
            {{ holiday[data.day] }}
          </span>
        </p>
      </template>
    </el-calendar>
  </div>
</template>
<script>
export default {
  data() {
    return {
      holiday: {
        "2021-01-01": "元旦",
        "2021-02-11": "除夕",
        "2021-02-12": "春节",
        "2021-02-13": "",
        "2021-02-14": "情人节",
        "2021-02-15": "",
        "2021-02-16": "",
        "2021-02-17": "",
        "2021-04-04": "清明节",
        "2021-05-01": "劳动节",
        "2021-06-14": "端午节",
        "2021-09-21": "中秋节",
        "2021-10-01": "国庆节",
      },
    };
  },
  

};
</script>

<style lang="less" >
.dots {
  color: #ef4f4f;
  &::after {
    content: "休";
  }
}

.el-calendar-table:not(.is-range) td.next {
  .dots {
    color: #c0c4cc;
  }
}
.calendar{
.el-calendar-table tr td:first-child,
td:last-child {
  color: #ef4f4f;
  p:first-child::after {
    content: "休";
  }
}
}
</style>